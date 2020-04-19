<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Faculty;
use App\Student;

class Institution extends Model
{
    protected $table = 'institutions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'title',
    	'acroname',
    	'logo',
    	'website',
    	'email',
    	'zip',
    	'address',
    	'status'
    ];

    public function fercilitators()
    {
    	return $this->hasMany(Fercilitator::class);
    }

    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function faculties()
    {
    	return $this->hasMany(Faculty::class);
    }
}
