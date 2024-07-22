<?php

namespace App\Policies;

use App\Models\Notification;
use Illuminate\Auth\Access\HandlesAuthorization;
use LdapRecord\Models\ActiveDirectory\User;

class NotificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view_notifications');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Notification $notification)
    {
        return $user->hasPermissionTo('view_notifications');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create_notifications');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Notification $notification)
    {
        return $user->hasPermissionTo('edit_notifications');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Notification $notification)
    {
        return $user->hasPermissionTo('delete_notifications');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Notification $notification)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \LdapRecord\Models\ActiveDirectory\User  $user
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Notification $notification)
    {
        //
    }
}
