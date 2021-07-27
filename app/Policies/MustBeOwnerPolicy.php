<?php

namespace App\Policies;

use App\Model\Category;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class MustBeOwnerPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Model  $model
     * @return mixed
     */
    public function view(User $user, Model $model)
    {
        return $user->id == $model->user_id;
    }    

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Model  $model
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }  

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Model  $model
     * @return mixed
     */
    public function update(User $user, Model $model)
    {
        return $user->id == $model->user_id;
    }       

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Model  $model
     * @return mixed
     */
    public function delete(User $user, Model $model)
    {
        return $user->id == $model->user_id;
    }        
}