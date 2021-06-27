<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Video;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Tag extends Model implements Searchable
{
    //
    use Sluggable,Cachable;

    protected $table = 'tags';
    protected $primaryKey = 'id';
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

    public function getSearchResult(): SearchResult
    {
        $url = route('post.tags', $this->slug);

        return new SearchResult(
                $this,
                $this->name,
                $url
            );
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

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords($value);
    }

    public function setDescAttribute($value)
    {
        return $this->attributes['desc'] = ucwords($value);
    }
}
