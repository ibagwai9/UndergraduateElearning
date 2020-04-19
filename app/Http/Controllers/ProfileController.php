<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Program;
use App\Course;
use App\StudentCourse;
use App\Student;
use App\Session;
use App\Institution;
use App\Faculty;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\AcademicProfileRequest;
use App\Traits\PhotoUploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use PhotoUploadTrait;

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        if(auth()->user()->userable && auth()->user()->userable->status>0)
            return view('student.home');
        else 
            return redirect()->route('student-setup',1);
    }
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        
        if($request->userable_type){
            $request['userable_type'] = 'App\\'.$request->userable_type;
        }
        $filePath =null;
        if ($request->has('photo')) {
            // Get image file
            $image = $request->file('photo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            
        }
        $request['profile_pic'] = $filePath;

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }


     /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function editAcademic()
    {
        return view('profile.edit-academic');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAcademic(AcademicProfileRequest $request)
    {
        //return dd($request->all());
        if($request->status && $request->status =='1'){
            auth()->user()->getStudent()->update(['status'=>1]);
        }
        elseif($request->has('personal') && auth()->user()->getType() =='Student' )
        {
            if(auth()->user()->userable_id==null)
            {
               $student =  Student::create($request->all()); 
               auth()->user()->update(['userable_id'=>$student->id]);
            }else
            {
                $student = auth()->user()->getStudent();
                $request['id'] = $student->id;
                auth()->user()->update(['userable_id'=>$student->id]);
                $student->update($request->all());
            }       
            
            return back()->withStatus(__('Personal data successfully updated.'));
        }else{
            
            $program = Program::where('name', explode('-',$request->program)[0])->first();
            $institution_id = Institution::where('title', explode('-',$request->institution)[0])->first()->id;
            $data = array_merge($request->all(),
            ['program_id'=>$program->id,
            'institution_id'=>$institution_id,
            'faculty_id'=>$program->faculty_id]);

            if(auth()->user()->userable_id){
                auth()->user()->userable->update($data);
            }else{
                $student = Student::create($data);
                $student->save();
                auth()->user()->update(['userable_id'=>$student->id]);
            }    
        }
            
        return back()->withStatus(__('Academic profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
    
    /** 
     * Save and update student courses registration
     * 
     */

     public function courses(Request $request)
     {
        $userCourses = auth()->user()->userable->courses;
        $userCoursesIds = $userCourses->map( function($Stdcourse){
            return $Stdcourse->course->id;
        });
        $userCoursesIds;
        $courses = $request->courseId;
        $ses = Session::getCurrent();
        foreach ($courses as $id) {            
            $course = Course::find($id);
            if($course->count()>0){
                try {
                    StudentCourse::updateOrCreate([
                        'student_id'=> auth()->user()->userable->id,
                        'course_id'=> $id,
                        'level'=> auth()->user()->userable->level,
                        'semester'=> $course->semester,
                        'session_id'=>$ses->count()>0? $ses->id: 1,
                        'status'=>1,
                    ]);
                } catch (Exception $e) {
                    return back()->withError(__('Courses registration failed due to '.$e->getMessage()));
                }                
            }            
        }
        return back()->withstatus(__('Courses registed successfully.'));
     }

     /** 
     * delete student courses registration
     * to delete courses that are not in the requested list
     */

    public function deleteCourse(Request $request)
    {
        
        $id = $request->courseId;
        $course = StudentCourse::find($id);
        if( $course && $course ->count()>0)
        {
            $course ->delete();
            echo('Course has been deleted');
        }
        else
        {
            echo('Course not deleted');
        }
    }
}
