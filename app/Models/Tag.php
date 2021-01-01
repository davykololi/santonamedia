<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    //
    use Sluggable;

    protected $table = 'tags';
    protected $fillable = ['name','desc','keywords'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'separator' => '-',
                'unique' => true,
                'maxLenghKeepWords' => true,
                'onUpdate' => true,
            ]
        ];
    }

    public function posts()
    {
    	return $this->belongsToMany(Post::class,'post_tag')->withTimestamps();
    }

    public function videos()
    {
    	return $this->belongsToMany(Video::class,'tag_video')->withTimestamps();
    }

    public function path()
    {
        return route('post.tags', $this->slug);
    }

    public function videoPath()
    {
        return route('video.tags', $this->slug);
    }
}
