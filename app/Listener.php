<?php

namespace App;

use App\user;
use App\Listener;
use Illuminate\Database\Eloquent\Model;

class Listener extends Model
{
    protected $table = 'listeners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userable_id',
        'item_id',
        'item_type',
        'duration',
    	'status'
    ];

    public function user()
    {
        return $this->morphOne(User::class,'userable');
    }

    public function item()
    {
    	return $this->belongsTo("App\$this->item_type");
    }
}
