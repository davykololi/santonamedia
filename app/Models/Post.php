<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //
    use Sluggable;

    protected $table = 'posts';
    protected $fillable = ['title','image','caption','content','description','keywords','admin_id','category_id'];
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
    return $this->hasMany('App\Models\Comment','post_id','id');
    }

    public function category()
    {
    return $this->belongsTo('App\Models\Category')->withDefault();
    }

    public function setTitleAttribute($value) 
    {
        $this->attributes['title'] = strtoupper($value);
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
        return $this->belongsToMany('App\Models\Tag','post_tag')->withTimestamps();
    }
}
