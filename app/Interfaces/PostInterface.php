<?php 

namespace App\Interfaces;

interface PostInterface
{
	public function all();

	public function authPosts();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);

	public function randonmPublishedTwo();

	public function latestPublishedFive();

	public function postSlug(string $slug);

	public function allPublishedPosts();
}