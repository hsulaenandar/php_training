<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Dao\Student\StudentDaoInterface', 'App\Dao\Student\StudentDao');
        $this->app->bind('App\Contracts\Services\Student\StudentServiceInterface', 'App\Services\Student\StudentService');

        $this->app->bind('App\Contracts\Dao\Subject\SubjectDaoInterface', 'App\Dao\Subject\SubjectDao');
        $this->app->bind('App\Contracts\Services\Subject\SubjectServiceInterface', 'App\Services\Subject\SubjectService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
