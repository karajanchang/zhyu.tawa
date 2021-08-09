<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2019-03-02
 * Time: 05:36
 */

namespace Tawa;

use Illuminate\Support\ServiceProvider;


class TawaServiceProvider extends ServiceProvider
{
    protected $commands = [
    ];

    public function register(){
        $this->loadFunctions();


//        $this->app->bind('InfobipSms', function()
//        {
//            return app()->make(InfobipService::class);
//        });

        $this->registerAliases();
    }

    public function boot(){

        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }

        $this->mergeConfigFrom(
            __DIR__.'/config/tawa.php', 'tawa'
        );

        $this->loadTranslationsFrom(__DIR__ . '/lang', 'Tawa');

        $this->loadViewsFrom(__DIR__.'/views', 'Tawa');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views'),
        ]);


        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    protected function loadFunctions(){
        foreach (glob(__DIR__.'/functions/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            TawaServiceProvider::class,
        ];
    }

    /**
     * Register aliases.
     *
     * @return null
     */
    protected function registerAliases()
    {

    }

    protected function isLumen()
    {
        return str_contains($this->app->version(), 'Lumen');
    }
}
