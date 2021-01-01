<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    //
    protected $table = 'categories';
	protected $fillable = ['name','slug','description','keywords'];
    use Sluggable;

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
		return $this->hasMany(Post::class,'category_id','id');
	}

    public function videos()
    {
        return $this->hasMany(Video::class,'category_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'category_id','id');
    }

    public function path()
    {
        return route('category.articles', $this->slug);
    }

    public function videoPath()
    {
        return route('category.videos', $this->slug);
    }
}
