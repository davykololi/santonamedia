<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Http\Requests\CategoryFormRequest as StoreRequest;
use App\Http\Requests\CategoryFormRequest as UpdateRequest;

class CategoryService
{
	protected $categoryRepository;

	public function __construct(CategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}

	public function all()
	{
		return $this->categoryRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $request->all();

		return $this->categoryRepository->create($data);
	}

	public function getId($id)
	{
		return $this->categoryRepository->getId($id);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $request->all();

		return $this->categoryRepository->update($data,$id);
	}

	public function delete($id)
	{
		return $this->categoryRepository->delete($id);
	}
}