<?php

namespace App;

use App\faculty;
use App\Program;
use App\Session;
use App\Listener;
use App\ChapterAttachment;
use App\ChapterComment;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lecture_id',
        'fercilitator_id',
        'title',
        'content',
    	'status'
    ];

    public function lecture()
    {
    	return $this->belongsTo(lecture::class,'lecture_id');
    }

    public function fercilitator()
    {
    	return $this->belongsTo(Fercilitator::class,'fercilitator_id');
    }

    public function listeners()
    {
    	return $this->hasMany(Listener::class);
    }

    public function attachments()
    {
        return $this->hasMany(ChapterAttachment::class);
    }

    public function comments()
    {
        return $this->hasMany(ChapterComment::class);
    }
}
