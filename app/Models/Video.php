<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Comment;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Str;
use Spatie\Searchable\Searchable;
use\Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Video extends Model implements Feedable,Searchable
{
    //
    use Sluggable,Cachable;
    const EXCERPT_LENGTH = 150;
    protected $table = 'videos';
    protected $primaryKey = 'id';
    protected $fillable = ['title','video','caption','content','description','keywords','is_published','admin_id','category_id'];
    protected $appends = ['created_date'];

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

    public function getSearchResult(): SearchResult
    {
        $url = route('users.videos.read', $this->slug);

        return new SearchResult(
                $this,
                $this->title,
                $url
            );
    }
   
    public function admin()
    {
    return $this->belongsTo(Admin::class)->withDefault();
    }

    public function user()
    {
    return $this->belongsTo(User::class)->withDefault();
    }

    public function comments()
    {
    return $this->morphMany(Comment::class,'commentable');
    }

    public function category()
    {
    return $this->belongsTo(Category::class)->withDefault();
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
        return $this->belongsToMany(Tag::class,'tag_video')->withTimestamps();
    }

    public function toFeedItem():FeedItem
    {
        return FeedItem::create([
                'id'=>env('APP_URL').'/video/'.$this->slug,
                'title'=>$this->title,
                'summary'=>$this->description,
                'updated'=>$this->updated_at,
                'link'=>route('users.videos.read',$this->slug),
                'author'=>$this->admin->name,
                ]);
    }

    public static function getFeedItems()
    {
        return Video::published()->orderBy('created_at','desc')->limit(50)->get();
    }

    public function excerpt()
    {
        return Str::limit(strip_tags($this->content),Video::EXCERPT_LENGTH);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }

    public function path()
    {
        return route('users.videos.read', $this->slug);
    }

    public function scopeEagerLoaded($query)
    {
        return $query->with('admin','category','tags','comments')->withCount('comments');
    }

    public function videoUrl()
    {
        return url('/storage/public/videos/'.$this->video);
    }
}
