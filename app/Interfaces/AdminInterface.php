<?php 

namespace App\Interfaces;

interface AdminInterface
{
	public function all();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);

	public function adminSlug(string $slug);
}