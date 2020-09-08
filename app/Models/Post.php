<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model implements Feedable
{
    //
    use Sluggable,Searchable;

    protected $table = 'posts';
    protected $fillable = ['title','image','caption','summary','content','description','keywords','admin_id','category_id'];
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
        return 'posts_index';
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

    public function toFeedItem()
    {
        return FeedItem::create([
                'id'=>$this->id,
                'title'=>$this->title,
                'summary'=>$this->summary,
                'updated'=>$this->updated_at,
                'link'=>route('users.posts.read',$this->slug),
                'author'=>$this->admin->name,
                ]);
    }

    public static function getFeedItems()
    {
        return Post::orderBy('created_at','desc')->limit(50)->get();
    }
}
