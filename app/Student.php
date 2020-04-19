<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'reg_no',
        'dob',
        'phone', 
        'gender', 
        'address', 
        'level', 
        'status',
        'institution_id',
        'program_id',
        'faculty_id'
    ];

    public static $createRule = [

    ];

    public function user()
    {
        return $this->morphOne(User::class,'userable');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution','institution_id');
    }

    public function faculty()
    {
        return $this->belongsTo('App\Faculty','faculty_id');
    }

    public function program()
    {
        return $this->belongsTo('App\Program','program_id');
    }

    public function courses()
    {
        return $this->hasMany('App\StudentCourse');
    }
    
    public function getLevelPrograms()
    {
        return LevelProgram::where('level',$this->level)
        ->where('program_id',$this->program_id)->get();
    }

    public function getSemesterCourses($semester)
    {
        return StudentCourse::where('student_id',$this->id)
        ->where('level',$this->level)
        ->where('semester',$semester)->get();
    }
}
