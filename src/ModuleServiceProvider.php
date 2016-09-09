<?php namespace furkankadioglu\Modvel;

/************************
*
*	Rys - Furkan Kadıoğlu
*	May - 2016	
*	http://github.com/furkankadioglu
*
*************************/

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider {

	protected $files;

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */

	// Publish - Folders
	public $publishFolders = [
		'assets',
		'uploads',
		'uploads/photos',
		'uploads/videos',
		'uploads/audios',
		'uploads/files',
		'uploads/documents'
	];


	public function boot() {

		if(is_dir(app_path().'/Modules/')) 
		{
			$modules = array_map('class_basename', $this->files->directories(app_path().'/Modules/'));
			foreach($modules as $module)  
			{

				// Routes Register
				if (!$this->app->routesAreCached()) 
				{
					$routes = app_path() . '/Modules/' . $module . '/app/routes.php';
					if($this->files->exists($routes)) include $routes;
				}

				// Views Register
				$viewDir  = app_path().'/Modules/'.$module.'/Resources/views';
				if($this->files->isDirectory($viewDir)) $this->loadViewsFrom($viewDir, $module);

				// Lang Register
				$langDir  = app_path().'/Modules/'.$module.'/Resources/lang';
				if($this->files->isDirectory($langDir)) $this->loadTranslationsFrom($langDir, $module);

			}
		}

		/*
		*	php artisan vendor:publish
		*/

		// config/
		$this->publishes([
			__DIR__.'/Config/modulemanagement.php' => config_path('modulemanagement.php'),
		], 'config');

		// app/
		// app/http/controllers
		$this->publishes([
			__DIR__.'/App/Http/Controllers/AdminTemplateController.php' => app_path('/Http/Controllers/AdminTemplateController.php'),
			__DIR__.'/App/Http/Controllers/AdminController.php' => app_path('/Http/Controllers/AdminController.php'),
			__DIR__.'/App/Http/Controllers/MainTemplateController.php' => app_path('/Http/Controllers/MainTemplateController.php'),
			__DIR__.'/App/Http/Controllers/MainController.php' => app_path('/Http/Controllers/MainController.php'),
			__DIR__.'/App/Http/Middleware/AdminMiddleware.php' => app_path('/Http/Middleware/AdminMiddleware.php'),
			__DIR__.'/App/Models/Audio.php' => app_path('/Models/Audio.php'),
			__DIR__.'/App/Models/Document.php' => app_path('/Models/Document.php'),
			__DIR__.'/App/Models/Photo.php' => app_path('/Models/Photo.php'),
			__DIR__.'/App/Models/UploadedFile.php' => app_path('/Models/UploadedFile.php'),
			__DIR__.'/App/Models/Video.php' => app_path('/Models/Video.php'),
			__DIR__.'/App/BaseHelpers.php' => app_path('BaseHelpers.php'),
			__DIR__.'/App/Modules/Modvel' => app_path('/Modules/Modvel'),
		], 'app');


		//	resources/views
		$this->publishes([
			__DIR__.'/Resources/views/masters/main.blade.php' => resource_path('/views/masters/main.blade.php'),
			__DIR__.'/Resources/views/masters/admin.blade.php' => resource_path('/views/masters/admin.blade.php'),
			__DIR__.'/Resources/views/masters/mail.blade.php' => resource_path('/views/masters/mail.blade.php'),

		], 'resources');

		//	Publish Folders Generate
		foreach((array)$this->publishFolders as $pf)
		{
			if (!file_exists(public_path($pf))) 
			{
		    	mkdir(public_path($pf), 0777, true);
			}
		}
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->files = new Filesystem;
		$this->registerMakeCommand();
		$this->registerListCommand();
		$this->registerMigrateCommand();
		$this->registerMigrateAllCommand();
		$this->registerDeleteCommand();
	}

	/**
	 * Register the "make:module" console command.
	 *
	 * @return Console\ModuleMakeCommand
	 */
	protected function registerMakeCommand() {
		
		$this->commands('modules.make');
		$bind_method = method_exists($this->app, 'bindShared') ? 'bindShared' : 'singleton';
		$this->app->{$bind_method}('modules.make', function($app) {
			return new Console\ModuleMakeCommand($this->files);
		});
	}

	public function registerListCommand() {
		
		$this->commands('modules.list');
		$bind_method = method_exists($this->app, 'bindShared') ? 'bindShared' : 'singleton';
		$this->app->{$bind_method}('modules.list', function($app) {
			return new Console\ModuleListCommand($this->files);
		});
	}

	public function registerMigrateCommand() {
		
		$this->commands('modules.migrate');
		$bind_method = method_exists($this->app, 'bindShared') ? 'bindShared' : 'singleton';
		$this->app->{$bind_method}('modules.migrate', function($app) {
			return new Console\ModuleMigrateCommand($this->files);
		});
	}

	public function registerMigrateAllCommand() {
		
		$this->commands('modules.migrateall');
		$bind_method = method_exists($this->app, 'bindShared') ? 'bindShared' : 'singleton';
		$this->app->{$bind_method}('modules.migrateall', function($app) {
			return new Console\ModuleMigrateAllCommand($this->files);
		});
	}

	public function registerDeleteCommand() {
		
		$this->commands('modules.delete');
		$bind_method = method_exists($this->app, 'bindShared') ? 'bindShared' : 'singleton';
		$this->app->{$bind_method}('modules.delete', function($app) {
			return new Console\ModuleDeleteCommand($this->files);
		});
	}

}
