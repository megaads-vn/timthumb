<?php namespace Spescina\Timthumb;

use Config;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class TimthumbServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// $this->package('spescina/timthumb');
        $this->publishConfig();        
        include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->app['timthumb'] = $this->app->share(function($app){
        //                 return new Timthumb;
		//         });

		App::singleton('timthumb', function() {
            return new Timthumb();
        });
	}

	private function publishConfig()
    {
        $path = $this->getConfigPath();
        $this->publishes([$path => config_path('timthumb.php')], 'config');
    }


	private function getConfigPath()
    {
        return __DIR__.'/../../config/config.php';
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('timthumb');
	}

}