<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Video;

class VideoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(Admin $admin,Video $video)
    {
        return $admin->ownsVideo($video);
    }

    public function delete(Admin $admin,Video $video)
    {
        return $admin->ownsVideo($video);
    }
}
