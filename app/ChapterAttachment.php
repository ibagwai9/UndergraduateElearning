<?php

namespace App;

use App\faculty;
use App\Program;
use App\Session;
use App\Listener;
use Illuminate\Database\Eloquent\Model;

class ChapterAttachment extends Model
{
    protected $table = 'chapter_attachments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chapter_id',
        'fercilitator_id',
        'name',
        'url',
        'mime_type',
        'ext',
    	'status'
    ];

    public function chapter()
    {
    	return $this->belongsTo(Chapter::class);
    }

    public function fercilitator()
    {
    	return $this->belongsTo(Fercilitator::class,'fercilitator_id');
    }

    public function listeners()
    {
    	return $this->hasMany(Listener::class);
    }
}
