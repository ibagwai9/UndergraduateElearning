<?php

namespace App;

use App\Lecture;
use App\Program;
use App\Student;
use App\Fercilitator;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'program_id',
    	'title',
    	'code',
    	'credit',
    	'status',
    	'level',
    ];

    public function fercilitators()
    {
    	return $this->hasMany(Fercilitator::class);
    }

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
    public function program()
    {
    	return $this->belongsTo(Program::class);
    }

    public function lectures()
    {
    	return $this->hasMany(Lecture::class);
    }
}
