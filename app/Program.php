<?php

namespace App;

use App\faculty;
use App\Program;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'title',
        'faculty_id',
    	'max_sessions',
    	'max_credit'
    ];

    public function fercilitators()
    {
    	return $this->hasMany(Fercilitator::class);
    }

    public function students()
    {
    	return $this->hasMany(Students::class);
    }

    public function faculty()
    {
    	return $this->belongsTo(Faculty::class);
    }

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
