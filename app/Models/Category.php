<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Category extends Model implements Searchable
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
	protected $fillable = ['name','slug','description','keywords'];
    use Sluggable,Cachable;

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

    public function getSearchResult(): SearchResult
    {
        $url = route('category.articles', $this->slug);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
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

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords($value);
    }

    public function setDescriptionAttribute($value)
    {
        return $this->attributes['description'] = ucwords($value);
    }
}
