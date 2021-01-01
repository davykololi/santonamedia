<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;

class PostPolicy
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

    public function update(Admin $admin,Post $post)
    {
    	return $admin->ownsPost($post);
    }

    public function delete(Admin $admin,Post $post)
    {
    	return $admin->ownsPost($post);
    }
}
