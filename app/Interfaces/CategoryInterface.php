<?php 

namespace App\Interfaces;

interface CategoryInterface
{
	public function all();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);

	public function categorySlug(string $slug);

	public function categoryWithPosts();

	public function categoryWithVideos();

	public function politicsCategory();

	public function sportsCategory();

	public function tecnologyCategory();

	public function santonaMagCategory();

	public function entertainmentCategory();
}