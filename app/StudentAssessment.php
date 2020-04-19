<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Course;

class StudentAssessment extends Model
{
	 protected $table = 'student_assessments';

    protected $fillable = [
        'student_id',
        'course_id',
        'session_id',
        'score',
        'level',
        'semester',
        'status',
    ];
    
    public function student() {
        return $this->belongsTo(Student::class);
    }
    public function course() {
        return $this->belongsTo(Course::class);
    }
}
