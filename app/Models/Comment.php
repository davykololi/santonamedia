<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['content','user_id','post_id','video_id','category_id'];
    protected $appends = ['createdDate'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post')->withDefault();
    }

    public function video()
    {
        return $this->belongsTo('App\Models\Video')->withDefault();
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
