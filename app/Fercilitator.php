<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fercilitator extends Model
{
    protected $table = 'fercilitators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone', 
        'dob',
        'gender',
        'address',
        'role_id',
        'school_id',
        'institution_id',
        'course_id'
    ];

    public static $createRule = [

    ];

    public function user()
    {
        return $this->morphOne(User::class,'userable_id');
    }
}
