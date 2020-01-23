<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = ['content','user_id','post_id'];
    protected $appends = ['createdDate'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id','id')->withDefault();
    }

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withDefault();
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
