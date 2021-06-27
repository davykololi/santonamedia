<?php

namespace App\Services;

use App\Repositories\TagRepository;
use App\Http\Requests\TagFormRequest as StoreRequest;
use App\Http\Requests\TagFormRequest as UpdateRequest;

class TagService
{
	protected $tagRepository;

	public function __construct(TagRepository $tagRepository)
	{
		$this->tagRepository = $tagRepository;
	}

	public function all()
	{
		return $this->tagRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $request->all();

		return $this->tagRepository->create($data);
	}

	public function getId($id)
	{
		return $this->tagRepository->getId($id);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $request->all();

		return $this->tagRepository->update($data,$id);
	}

	public function delete($id)
	{
		return $this->tagRepository->delete($id);
	}
}