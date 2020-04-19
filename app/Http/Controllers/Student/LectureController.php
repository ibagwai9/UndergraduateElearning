<?php

namespace App\Http\Controllers\Student;

use App\Faculty;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LectureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index(Request $request, Course $course)
    {
        return view("student.lectures.index", compact('course'));
    }
}
