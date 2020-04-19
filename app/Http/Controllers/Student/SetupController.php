<?php

namespace App\Http\Controllers\Student;

use App\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetupController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     
    public function index()
    {
        $faculties = Faculty::all();
        return view('home', compact('faculties'));
    }
    */
    
    public function setupSteps($stage = 1)
    {
        $faculties = \App\Faculty::all();
        return view("student.index", compact('stage'));
    }
}
