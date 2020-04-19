<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Program;
class AjaxController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        return view("student.program.index");
        
    }

    function fetchCourses(Request $request, $semester)
    {
        
        /*$courses = json_decode($request->get('courses'));
        foreach ($courses as $cs) {
            echo $cs;
        }
        return ;
        */
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('courses')
            ->where('code', 'LIKE', "%{$query}%" )
            ->orWhere('title', 'LIKE', "%{$query}%")            
            ->where('semester', $semester )             
            ->where('level', '<=', auth()->user()->userable->level )  
            ->get();
            $output = '';
            foreach($data as $course)
            {
                //if( !in_array($course->id, $courses)){
                    $output .= "
                    <tbody id='course-$course->semester'> 
                        <tr>
                            <td wdth='2%' class='text-left'><input type='checkbox' name='courseId[]' value='$course->id' /></td>
                            <td wdth='15%' class='text-left'>$course->code</td>
                            <td wdth='60%' class='text-left'>$course->title</td>
                            <td wdth='5%' class='left-center' >$course->status</td>
                            <td wdth='5%' class='left-center'>$course->credit</td>
                        </tr>
                    </tbody>";
                //}
                
            }

            echo $output;
           // echo $request->courses;
        }
    }

    function fetchProgram(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('programs')
            ->where('name', 'LIKE', "%{$query}%" )
            ->orWhere('title', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li id="program" ><a href="#">'.$row->name.' - ('.$row->title.')</a></li>';
            }
            $output .= '</ul>';

            echo $output;
        }
    }

    function fetchFaculty(Request $request)
    {
        if($request->get('query'))
        {
            $query = explode('-',$request->get('query'))[0];
            $data = Program::where('name', $query )
            ->get();
            $output = 'Faculty of ';
            foreach($data as $row)
            {
                $output .=$row->faculty->name;
            }

            echo $output;
        }
    }
}