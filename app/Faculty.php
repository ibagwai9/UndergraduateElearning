<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;

class Faculty extends Model
{
    protected $table = 'faculties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [	'name' ];

    public function fercilitators()
    {
    	return $this->hasMany(Fercilitator::class);
    }

    public function students()
    {
    	return $this->hasMany(Students::class);
    }

    public function institution()
    {
    	return $this->belongsTo(Institution::class);
    }
    
    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
