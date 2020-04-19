<?php

function getFaculties()
{
    return \App\Faculty::all()->take(4);
}

function getPrograms()
{
    return \App\Program::all();
}

function getProgram($id)
{
    return \App\Program::find($id);
}

function getUserProgress()
{
    $user = auth()->user();    
    $list = array_merge($user->userable?$user->userable->getAttributes():[],$user->getAttributes());
    $num=0;
    foreach ($list as $key => $val) {
        if($val){
            $num+=(1/count($list))*100;
        }
    }
    return $num;
}

function sSetupRoutes()
{
    $user = auth()->user(); 
    $entry = false;
    $personal = false;
    $institution = false;
    $program = false;
    
    if($user->userable_id && $user->userable_type && $user->profile_pic ){
        $entry = true;
    }

    if($user->userable && $user->userable->name && $user->userable->dob 
        && $user->userable->gender && $user->userable->reg_no && $user->userable->phone 
        && $user->userable->address   ){
        $personal = true;
    }

    if($user->userable && $user->userable->faculty_id && $user->userable->program_id 
        && $user->userable->institution_id && $user->userable->level ){
        $program = true;
    }
    return [
        ['Entry', $entry],
        ['Personal information',$personal],
        ['Institution & program',$program],
        ['Profile Priview',false]
    ];
}
?>