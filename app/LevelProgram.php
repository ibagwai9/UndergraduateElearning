<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class LevelProgram extends Model
{
    protected $table = 'Level_programs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'courses',
        'program_id',
        'level',
        'semester',
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

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

    public function program()
    {
    	return $this->belongsTo('App\Program');
    }

    public function getCourses()
    {
        $data = [];
        $ids = explode(',', $this->courses);
        //return dd($ids);
        foreach ($ids as $id) {
            $cs = Course::find($id);
            if($cs && $cs->count()>0){
                array_push( $data, $cs);
            }
        }
        
        return $data;
    }
}
