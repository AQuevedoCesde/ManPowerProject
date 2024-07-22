<?php

use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Masivian\Email\EmailApi;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\It\CardController;
use App\Http\Controllers\Admin\VacancieController;
use App\Http\Controllers\Admin\It\BacklogController;
use App\Http\Controllers\Admin\It\ProgressController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\It\ManagementController;
use App\Http\Controllers\Admin\VacancieSocialController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('administracion')->group(function () {
        // Roles
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/crear', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('/roles/{role}/editar', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

        // Users
        Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
        Route::get('/usuarios/crear', [UserController::class, 'create'])->name('users.create');
        Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');
        Route::post('users/adldap-info', [UserController::class, 'adldapInfo'])->name('users.adldap');
        Route::get('/usuarios/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/usuarios/{user}/editar', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        // Notifications
        Route::get('/notificaciones', [NotificationController::class, 'index'])->name('notifications.index');
        Route::get('/notificaciones/crear', [NotificationController::class, 'create'])->name('notifications.create');
        Route::post('/notificaciones', [NotificationController::class, 'store'])->name('notifications.store');
        Route::get('/notificaciones/{notification}', [NotificationController::class, 'show'])->name('notifications.show');
        Route::get('/notificaciones/{notification}/editar', [NotificationController::class, 'edit'])->name('notifications.edit');
        Route::put('/notificaciones/{notification}', [NotificationController::class, 'update'])->name('notifications.update');
        Route::delete('/notificaciones/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    });

    // Cities
    Route::get('cities/{state}', [CityController::class, 'index'])->name('cities.index');

    Route::prefix('marketing')->group(function () {
        // Media files 
        Route::get('/multimedia', [UploadController::class, 'index'])->name('vacancies.uploads.index');
        Route::get('/multimedia/crear', [UploadController::class, 'create'])->name('vacancies.uploads.create');
        Route::post('/multimedia/guardar', [UploadController::class, 'store'])->name('vacancies.uploads.store');
        Route::post('/multimedia/{mediaFile}', [UploadController::class, 'update'])->name('vacancies.uploads.update');
        Route::delete('/multimedia/{mediaFile}', [UploadController::class, 'destroy'])->name('vacancies.uploads.delete');

        // Vacancies
        Route::get('/vacantes', [VacancieController::class, 'index'])->name('vacancies.index');
        Route::get('/vacantes/crear', [VacancieController::class, 'create'])->name('vacancies.create');
        Route::post('/vacantes/guardar', [VacancieController::class, 'store'])->name('vacancies.store');
        Route::get('/vacantes/{vacancy}', [VacancieController::class, 'show'])->name('vacancies.show');
        Route::get('/vacantes/{vacancy}/editar', [VacancieController::class, 'edit'])->name('vacancies.edit');
        Route::put('/vacantes/{vacancy}', [VacancieController::class, 'update'])->name('vacancies.update');
        Route::delete('/vacantes/{vacancy}', [VacancieController::class, 'destroy'])->name('vacancies.destroy');

        // Process vacancy
        Route::get('/{vacancy}/social', [VacancieSocialController::class, 'index'])->name('vacancy.social');
        Route::post('/social/generar', [VacancieSocialController::class, 'generate'])->name('vacancy.social.generate');
        Route::post('/social/openai/completions', [VacancieSocialController::class, 'completions'])->name('vacancy.social.completions');
        Route::post('/social/guardar', [VacancieSocialController::class, 'store'])->name('vacancy.social.store');
        Route::post('/social/aprobar', [VacancieSocialController::class, 'approve'])->name('vacancy.social.approve');
        Route::post('/social/rechazar', [VacancieSocialController::class, 'reject'])->name('vacancy.social.reject');
        Route::delete('/social/{vacancyImage}', [VacancieSocialController::class, 'destroy'])->name('vacancy.social.delete');
        Route::get('/social/{vacancyImage}/editar', [VacancieSocialController::class, 'edit'])->name('vacancy.social.edit');
        Route::put('/social/{vacancyImage}', [VacancieSocialController::class, 'update'])->name('vacancy.social.update');

    });

    Route::get('managements/{area}', [ManagementController::class, 'index'])->name('managements.index');
   
    Route::prefix('it')->name('it.')->group(function () {
        //Backlog/leaders
        Route::get('/backlog',[BacklogController::class,'index'])->name('backlog.index');
        Route::get('/backlog/crear', [BacklogController::class, 'create'])->name('backlog.create');
        Route::post('/backlog/guardar',[BacklogController::class,'store'])->name('backlog.store');
        Route::get('/backlog/{project}', [BacklogController::class,'edit'])->name('backlog.edit');
        Route::delete('/projects/{project}', [BacklogController::class, 'destroy'])->name('projects.destroy');

        // Progress projects
        Route:: post('progress/guardar',[ProgressController::class,'store'])->name('progress.store');
    });

});



// require __DIR__ . '/auth.php';
