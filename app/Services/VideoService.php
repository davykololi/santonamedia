<?php

namespace App\Services;

use Auth;
use App\Repositories\VideoRepository;
use App\Traits\VideoUploadTrait;
use App\Http\Requests\VideoFormRequest as AdminRequest;
use App\Http\Requests\SuperAdVideoFormRequest as SuperRequest;

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

	public function create(AdminRequest $request)
	{
		$data = $this->createAdminData($request);

		return $this->videoRepository->create($data);
	}

	public function superadminCreate(SuperRequest $request)
	{
		$data = $this->createSuperadminData($request);

		return $this->videoRepository->create($data);
	}

	public function getId($id)
	{
		return $this->videoRepository->getId($id);
	}

	public function adminData(AdminRequest $request)
	{
		$data = $request->validated();
        $data['video'] = $this->verifyAndUpload($request,'video','public/videos/');
        $data['admin_id'] = Auth::id();
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

	public function createSuperadminData(SuperRequest $request)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function updateSuperadminData(SuperRequest $request,$id)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function superadminData(SuperRequest $request)
	{
		$data = $request->validated();
        $data['video'] = $this->verifyAndUpload($request,'video','public/videos/');
        $data['admin_id'] = $request->admin;
        $data['category_id'] = $request->category;
        $data['is_published']  = $request->has('publish');

        return $data;
	}

	public function update(AdminRequest $request,$id)
	{
		$data = $this->updateAdminData($request,$id);

		return $this->videoRepository->update($data,$id);
	}

	public function superadminUpdate(SuperRequest $request,$id)
	{
		$data = $this->updateSuperadminData($request,$id);

		return $this->videoRepository->update($data,$id);
	}

	public function delete($id)
	{
		return $this->videoRepository->delete($id);
	}
}