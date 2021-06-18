<?php 

namespace App\Interfaces;

interface VideoInterface
{
	public function all();

	public function authVideos();

	public function withEagerload();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);

	public function randomnPublishedTwo();

	public function latestPublishedFive();

	public function videoSlug(string $slug);
}