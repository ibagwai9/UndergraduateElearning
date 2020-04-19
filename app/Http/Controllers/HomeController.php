<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;


class HomeController extends Controller
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
    */
    public function index()
    {
        $faculties = \App\Faculty::all();
        return view("student.index");
    }

    public function redirect()
    {
        return redirect()->route(strtolower(auth()->user()->getRole()));
    }
}
