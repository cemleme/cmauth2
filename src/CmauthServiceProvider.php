<?php

namespace Cemleme\Cmauth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class CmauthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(GateContract $gate, \Illuminate\Routing\Router $router, \Illuminate\Contracts\Http\Kernel $kernel)
    {

        $router->middleware("acl", \Cemleme\Cmauth\middleware\Acl::class);
        $kernel->pushMiddleware(\Cemleme\Cmauth\middleware\SetLastActionTime::class);

        $this->loadViewsFrom(__DIR__.'/views', 'cmauth');
        
        include __DIR__ . '/routes.php';
        include __DIR__ . '/htmlmacros.php';

        $this->publishes([
            __DIR__.'/config/cmauth.php' => config_path('cmauth.php'),
            __DIR__.'/views/layouts/sidebar.blade.php' => base_path().'/resources/views/cmauth/sidebar.blade.php',
            __DIR__.'/views/layouts/footer.blade.php' => base_path().'/resources/views/cmauth/footer.blade.php',
        ]);


        // Dynamically register permissions with Laravel's Gate.
        foreach ($this->getPermissions() as $permission) {
            $gate->define($permission->name, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }

        $this->app->register('Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider');
        $this->app->register('Spatie\Backup\BackupServiceProvider');

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    }

    protected function getPermissions()
    {
        return \Cemleme\Cmauth\models\Permission::with('groups')->get();
    }
}