<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['content','user_id'];
    protected $appends = ['createdDate'];
    protected $touches = ['commentable'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function commentable()
    {
        return $this->morphTo()->withDefault();
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category')->withDefault();
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
