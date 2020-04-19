<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }
        return abort(404);
    }

    public function home()
    {
        $faculties = \App\Faculty::all();
        return view('index', compact('faculties'));
    }
}
