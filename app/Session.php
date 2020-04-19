<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {
    protected $table = "sessions";
    protected $fillable = ['name', 'status','resuming_time','closing_time'];
    
    public static function getCurrent(){
        return Session::where('status',1)->first();
    }
}

