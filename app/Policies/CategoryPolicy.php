<?php

namespace App\Policies;

use App\Model\Category;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $c
     * ategory
     * @return mixed
     */
    public function view(User $user, Category $category)
    {
        return true;
        return $user->id == $category->user_id;
                /* ? Response::allow()
                : Response::deny('You do not own this post.'); */
    }
}