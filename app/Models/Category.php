<?php

namespace App\Models;

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
		return $this->hasMany('App\Models\Post','category_id','id');
	}

	public function comments()
	{
		return $this->hasManyThrough('App\Models\Comment','App\Models\Post','post_id','category_id');
	}

	public function setNameAttribute($value)
	{
    	$this->attributes['name'] = strtoupper($value);
	}

}
