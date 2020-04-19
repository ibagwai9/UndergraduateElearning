<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'role_id'
    ];

    public static $createRule = [

    ];

    public function user()
    {
        return $this->morphOne(User::class,'userable_id');
    }
}
