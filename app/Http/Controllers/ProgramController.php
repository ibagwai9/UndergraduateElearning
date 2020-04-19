<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Program;
class ProgramController extends Controller
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