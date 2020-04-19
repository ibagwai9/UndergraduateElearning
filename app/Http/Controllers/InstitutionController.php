<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InstitutionController extends Controller
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
            $query = $request->get('query');
            $data = DB::table('institutions')
            ->where('acroname', 'LIKE', "%{$query}%" )
            ->orWhere('title', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li id="institution"><a href="#">'.$row->title.' - ('.$row->acroname.')</a></li>';
            }
            $output .= '</ul>';

            echo $output;
        }
    }
}