<?php

namespace App\Services;

use Auth;
use App\Repositories\VideoRepository;
use App\Traits\VideoUploadTrait;
use App\Http\Requests\VideoFormRequest as StoreRequest;
use App\Http\Requests\VideoFormRequest as UpdateRequest;

class VideoService
{
	use VideoUploadTrait;
	protected $videoRepository;

	public function __construct(VideoRepository $videoRepository)
	{
		$this->videoRepository = $videoRepository;
	}

	public function all()
	{
		return $this->videoRepository->all();
	}

	public function authVideos()
	{
		return $this->videoRepository->authVideos();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createAdminData($request);

		return $this->videoRepository->create($data);
	}

	public function superadminCreate(StoreRequest $request)
	{
		$data = $this->createSuperadminData($request);

		return $this->videoRepository->create($data);
	}

	public function getId($id)
	{
		return $this->videoRepository->getId($id);
	}

	public function adminData(UpdateRequest $request)
	{
		$data = $request->validated();
        $data['video'] = $this->verifyAndUpload($request,'video','public/videos/');
        $data['admin_id'] = Auth::id();
        $data['category_id'] = $request->category;
        $data['is_published']  = $request->has('publish');

        return $data;
	}

	public function createAdminData(StoreRequest $request)
	{
		$result = $this->adminData($request);

		return $result;
	}

	public function updateAdminData(UpdateRequest $request,$id)
	{
		$result = $this->adminData($request);

		return $result;
	}

	public function createSuperadminData(StoreRequest $request)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function updateSuperadminData(UpdateRequest $request,$id)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function superadminData(UpdateRequest $request)
	{
		$data = $request->validated();
        $data['video'] = $this->verifyAndUpload($request,'video','public/videos/');
        $data['admin_id'] = $request->admin;
        $data['category_id'] = $request->category;
        $data['is_published']  = $request->has('publish');

        return $data;
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateAdminData($request,$id);

		return $this->videoRepository->update($data,$id);
	}

	public function superadminUpdate(UpdateRequest $request,$id)
	{
		$data = $this->updateSuperadminData($request,$id);

		return $this->videoRepository->update($data,$id);
	}

	public function delete($id)
	{
		return $this->videoRepository->delete($id);
	}
}