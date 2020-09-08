<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Video extends Model
{
    //
    use Sluggable,Searchable;

    protected $table = 'videos';
    protected $fillable = ['title','video','caption','content','summary','description','keywords','admin_id','category_id'];
    protected $appends = ['createdDate'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'separator' => '-',
                'unique' => true,
                'maxLenghKeepWords' => true,
                'onUpdate' => true,
            ]
        ];
    }

    public function searchableAs()
    {
        return 'videos_index';
    }
   
    public function admin()
    {
    return $this->belongsTo('App\Admin')->withDefault();
    }

    public function user()
    {
    return $this->belongsTo('App\User')->withDefault();
    }

    public function comments()
    {
    return $this->hasMany('App\Models\Comment','video_id','id');
    }

    public function category()
    {
    return $this->belongsTo('App\Models\Category')->withDefault();
    }

    public function scopePopular($query) 
    {
        return $query->whereHas('comments','>=',2);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','tag_video')->withTimestamps();
    }
}
