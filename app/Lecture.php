<?php

namespace App;

use App\faculty;
use App\Program;
use App\Course;
use App\Chapter;
use App\Session;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'session_id',
        'fercilitator_id',
        'title',
        'content',
    	'semester',
    	'status'
    ];

    public function fercilitator()
    {
    	return $this->belongsTo(Fercilitator::class,'fercilitator_id');
    }

    public function students()
    {
    	return $this->hasMany(Students::class);
    }

    public function session()
    {
    	return $this->belongsTo(Session::class);
    }

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
    

    public function chapters()
    {
    	return $this->hasMany(Chapter::class);
    }
}
