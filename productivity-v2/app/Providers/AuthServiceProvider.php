<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\MediaFile;
use App\Models\Notification;
use App\Models\VacancyImage;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\VacancyPolicy;
use App\Policies\MediaFilePolicy;
use Spatie\Permission\Models\Role;
use App\Policies\NotificationPolicy;
use App\Policies\VacancyImagePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        MediaFile::class => MediaFilePolicy::class,
        Vacancy::class => VacancyPolicy::class,
        VacancyImage::class => VacancyImagePolicy::class,
        Notification::class => NotificationPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });
    }
}
