<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'roles' => $this->getUserRoles($request),
                'permissions' => $this->getUserPermissions($request),
                'user' => $request->user(),
            ],
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
            'flash' => [
                'message' => session('message')
            ],

        ]);
    }

    /**
     * Get user roles.
     *
     * This function retrieves an array of roles associated with the authenticated user.
     * If the user is not authenticated, an empty array is returned.
     *
     * @param \Illuminate\Http\Request $request The current HTTP request.
     * @return array An array containing the roles associated with the authenticated user.
     */
    private function getUserRoles($request)
    {
        if ($request->user()) {
            $roles = $request->user()->getRoleNames()->toArray();
            return $roles;
        }
        return [];
    }

    /**
     * Get the unique permissions associated with the current user.
     *
     * This function combines the permissions obtained through roles assigned to the user
     * with the direct permissions assigned to the user. It returns an array containing
     * all unique permissions without duplicates.
     *
     * @param \Illuminate\Http\Request $request The current HTTP request.
     * @return array An array containing the unique permissions of the user.
     */
    private function getUserPermissions($request)
    {
        if ($request->user()) {
            $roles_permissions = $request->user()->getPermissionsViaRoles()->pluck('name')->toArray();
            $permissions = $request->user()->getPermissionNames()->toArray();

            $unique_permissions = array_values(array_unique(array_merge($roles_permissions, $permissions)));
            return $unique_permissions;
        }
        return [];
    }
}
