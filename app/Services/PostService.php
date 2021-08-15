<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\PostFormRequest as AdminRequest;
use App\Http\Requests\SuperAdPostFormRequest as SuperAdRequest;

class PostService
{
	use ImageUploadTrait;
	protected $postRepository;

	public function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	public function all()
	{
		return $this->postRepository->all();
	}

	public function authPosts()
	{
		return $this->postRepository->authPosts();
	}

	public function create(AdminRequest $request)
	{
		$data = $this->createAdminData($request);

		return $this->postRepository->create($data);
	}

	public function superadminCreate(SuperAdRequest $request)
	{
		$data = $this->createSuperadminData($request);

		return $this->postRepository->create($data);
	}

	public function getId($id)
	{
		return $this->postRepository->getId($id);
	}

	public function adminData(AdminRequest $request)
	{
		$data = $request->validated();
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['admin_id'] = auth()->user()->id;
        $data['category_id'] = $request->category;
        $data['is_published']  = $request->has('publish');

        return $data;
	}

	public function createAdminData(AdminRequest $request)
	{
		$result = $this->adminData($request);

		return $result;
	}

	public function updateAdminData(AdminRequest $request,$id)
	{
		$result = $this->adminData($request);

		return $result;
	}

	public function createSuperadminData(SuperAdRequest $request)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function updateSuperadminData(SuperAdRequest $request,$id)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function superadminData(SuperAdRequest $request)
	{
		$data = $request->validated();
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['admin_id'] = $request->admin;
        $data['category_id'] = $request->category;
        $data['is_published']  = $request->has('publish');

        return $data;
	}

	public function update(AdminRequest $request,$id)
	{
		$data = $this->updateAdminData($request,$id);

		return $this->postRepository->update($data,$id);
	}

	public function superadminUpdate(SuperAdRequest $request,$id)
	{
		$data = $this->updateSuperadminData($request,$id);

		return $this->postRepository->update($data,$id);
	}

	public function delete($id)
	{
		return $this->postRepository->delete($id);
	}
}