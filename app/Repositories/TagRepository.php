<?php

namespace App\Repositories;

use App\Interfaces\TagInterface;
use App\Models\Tag;

class TagRepository implements TagInterface
{
	protected $tag;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function all()
    {
        return $this->tag->all();
    }

    public function create(array $data)
    {
    	return $this->tag->create($data);
    }

    public function getId($id)
    {
    	return $this->tag->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->tag->destroy($id);
    }

    public function tagWithPosts()
    {
        return $this->tag->with('posts')->get();
    }

    public function tagWithVideos()
    {
        return $this->tag->with('videos')->get();
    }

    public function tagSlug(string $slug)
    {
        return $this->tag->query()->whereSlug($slug)->first();
    }
}