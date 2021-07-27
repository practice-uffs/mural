<?php

namespace App\Policies;

use App\Model\Category;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class OpenViewPolicy
{
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
    public function view(User $user, Model $model)
    {
        return true;
    }    
}