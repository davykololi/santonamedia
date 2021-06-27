<?php 

namespace App\Interfaces;

interface TagInterface
{
	public function all();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);

	public function tagWithPosts();

	public function tagWithVideos();

	public function tagSlug(string $slug);
}