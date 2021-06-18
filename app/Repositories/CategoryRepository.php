<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
	protected $category;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return $this->category->all();
    }

    public function create(array $data)
    {
    	return $this->category->create($data);
    }

    public function getId($id)
    {
    	return $this->category->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->category->destroy($id);
    }

    public function categorySlug(string $slug)
    {
        return $this->category->query()->whereSlug($slug)->first();
    }

    public function categoryWithPosts()
    {
        return $this->category->with('posts')->get();
    }

    public function categoryWithVideos()
    {
        return $this->category->with('videos')->get();
    }

    public function politicsCategory()
    {
        return $this->category->query()->whereName('Politics')->first();
    }

    public function sportsCategory()
    {
        return $this->category->query()->whereName('Sports')->first();
    }

    public function tecnologyCategory()
    {
        return $this->category->query()->whereName('Technology')->first();
    }

    public function santonaMagCategory()
    {
        return $this->category->query()->whereName('Santona Magazine')->first();
    }

    public function entertainmentCategory()
    {
        return $this->category->query()->whereName('Entertainment')->first();
    }
}