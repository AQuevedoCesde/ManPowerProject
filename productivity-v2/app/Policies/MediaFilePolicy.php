<?php

namespace App\Policies;

use App\Models\MediaFile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view_mediafiles');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MediaFile $mediaFile)
    {
        return $user->hasPermissionTo('view_mediafiles');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create_mediafiles');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MediaFile $mediaFile)
    {
        return $user->hasPermissionTo('edit_mediafiles');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MediaFile $mediaFile)
    {
        return $user->hasPermissionTo('delete_mediafiles');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MediaFile $mediaFile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MediaFile $mediaFile)
    {
        //
    }
}
