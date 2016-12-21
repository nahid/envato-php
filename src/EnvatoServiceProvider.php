<?php
namespace Nahid\EnvatoPHP;

use Illuminate\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class EnvatoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->setupConfig();
    }
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->registerEnvatoPHP();
    }
    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/envato.php');
        // Check if the application is a Laravel OR Lumen instance to properly merge the configuration file.
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('envato.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('envato');
        }
        $this->mergeConfigFrom($source, 'envato');
    }

    /**
     * Register Talk class.
     */
    protected function registerEnvatoPHP()
    {
        $this->app->singleton('envato', function (Container $app) {
            return new Envato($app['config']->get('envato'));
        });
        $this->app->alias('envato', Envato::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'envato'
        ];
    }
}
