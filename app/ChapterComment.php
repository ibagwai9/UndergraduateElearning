<?php

namespace App;

use App\Chapter;
use App\User;
use App\Listener;
use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    protected $table = 'chapter_attachements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chapter_id',
        'user_id',
        'content',
        'status'
    ];

    public function chapter()
    {
    	return $this->belongsTo(Chapter::class,'lecture_id');
    }

    public function user()
    {
    	return $this->belongsTo(user::class,'user_id');
    }

    public function listeners()
    {
    	return $this->hasMany(Listener::class);
    }
}
