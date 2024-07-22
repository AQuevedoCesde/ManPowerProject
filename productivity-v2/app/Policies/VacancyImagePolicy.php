<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VacancyImage;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacancyImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can get data OpenAI.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function completions(User $user)
    {
        return $user->hasPermissionTo('create_image');
    }

    /**
     * Determine whether the user can generate images.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function generate(User $user)
    {
        return $user->hasPermissionTo('create_image');
    }

    /**
     * Determine whether the user can create images.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create_image');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, VacancyImage $vacancyImage)
    {
        return $user->hasPermissionTo('edit_image');
    }

    /**
     * Determine whether the user can approve image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VacancyImage  $vacancyImage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function approve(User $user)
    {
        return $user->hasPermissionTo('approve_image');
    }

    /**
     * Determine whether the user can reject image.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VacancyImage  $vacancyImage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reject(User $user)
    {
        return $user->hasPermissionTo('reject_image');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VacancyImage  $vacancyImage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, VacancyImage $vacancyImage)
    {
        return $user->hasPermissionTo('delete_image');
    }
}
