<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FacultyController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        return view("student.institution.index");
        
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = explode('-',$request->get('query'))[0];
            $data = DB::table('faculties')
            ->where('name', $query )
            ->get();
            $output = '';
            foreach($data as $row)
            {
                $output .=$row->name;
            }

            echo $output;
        }
    }
}