<?php

namespace App\Repositories;

use App\Interfaces\VideoInterface;
use App\Models\Video;

class VideoRepository implements VideoInterface
{
	protected $video;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function all()
    {
        return $this->video->latest()->paginate(5);
    }

    public function authVideos()
    {
    	return auth()->user()->videos()->with('admin','category','tags')->latest()->paginate(5);
    }

    public function withEagerload()
    {
        return $this->video->with('admin','category','comments','tags')->get();
    }

    public function create(array $data)
    {
    	return $this->video->create($data);
    }

    public function getId($id)
    {
    	return $this->video->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->video->destroy($id);
    }

    public function randomnPublishedTwo()
    {
        return $this->video->query()->with('category','admin','comments','tags')->published()->inRandomOrder()->limit(2)->get();
    }

    public function latestPublishedFive()
    {
        return $this->video->query()->with('admin','category','comments','tags')->published()->latest()->limit(5)->get();
    }

    public function videoSlug(string $slug)
    {
        return $this->video->with('admin','tags','category')->published()->withCount('comments')->whereSlug($slug)->firstOrFail();
    }
}