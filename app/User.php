<?php

namespace App;

use App\User;
use App\Student;
use App\Admin;
use App\Fercilitator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','phone', 'email','userable_id','userable_type','profile_pic', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the owning userable model.
     */
    public function userable()
    {
        return $this->morphTo();
    }

    public function getType()
    {
        return $this->userable_type ==null ? null : explode("\\", $this->userable_type)[1];
    }

    public function getRole()
    {
        return $this->userable_type ==null ? null : explode("\\", $this->userable_type)[1];
    }

    public function getAdmin(Type $var = null)
    {
        return Admin::find($this->userable_id);
    }

    public function getInstitution()
    {
        return $this->userModel();
    }

    public function getFercilitator(Type $var = null)
    {
        return Fercilitator::find($this->userable_id);
    }

    public function getStudent(Type $var = null)
    {
        return Student::find($this->userable_id);
    }
}
