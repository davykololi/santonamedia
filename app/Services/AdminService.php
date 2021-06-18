<?php

namespace App\Services;

use Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminRepository;
use App\Traits\ImageUploadTrait;

class AdminService
{
	use ImageUploadTrait;
	protected $adminRepository;

	public function __construct(AdminRepository $adminRepository)
	{
		$this->adminRepository = $adminRepository;
	}

	public function all()
	{
		return $this->adminRepository->all();
	}

	public function storeAdminData(Request $request)
	{
		$data = $request->all();
		$data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['password'] = Hash::make($request->password);
        $data['superadmin_id'] = Auth::user()->id;

        return $data;
	}

	public function updateAdminData(Request $request)
	{
		$data = $request->except('password');
		$data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['superadmin_id'] = Auth::user()->id;

        return $data;
	}

	public function createData(Request $request)
	{
		$result = $this->storeAdminData($request);

		return $result;
	}

	public function updateData(Request $request,$id)
	{
		$result = $this->updateAdminData($request,$id);

		return $result;
	}

	public function create(Request $request)
	{
		$data = $this->createData($request);

		return $this->adminRepository->create($data);
	}

	public function getId($id)
	{
		return $this->adminRepository->getId($id);
	}

	public function update(Request $request,$id)
	{
		$data = $this->updateData($request,$id);

		return $this->adminRepository->update($data,$id);
	}

	public function delete($id)
	{
		return $this->adminRepository->delete($id);
	}
}