<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{
    protected $post;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function all()
    {
        return $this->post->eagerLoaded()->latest()->paginate(5);
    }

    public function authPosts()
    {
        return auth()->user()->posts()->eagerLoaded()->latest()->paginate(5);
    }

    public function create(array $data)
    {
        return $this->post->create($data);
    }

    public function getId($id)
    {
        return $this->post->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->post->destroy($id);
    }

    public function randonmPublishedTwo()
    {
        return $this->post->eagerLoaded()->published()->inRandomOrder()->take(2)->get();
    }

    public function latestPublishedFive()
    {
        return $this->post->latest()->published()->take(5)->get();
    }

    public function postSlug(string $slug)
    {
        return $this->post->eagerLoaded()->published()->whereSlug($slug)->firstOrFail();
    }

    public function allPublishedPosts()
    {
        return $this->post->eagerLoaded()->published()->latest()->get();
    }
}