<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Comment extends Model
{
    use Cachable;
    //
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['content','user_id'];
    protected $appends = ['createdDate'];
    protected $touches = ['commentable'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function commentable()
    {
        return $this->morphTo()->withDefault();
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
