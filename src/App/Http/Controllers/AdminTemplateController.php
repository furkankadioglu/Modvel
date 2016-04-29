<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use File;
use Auth;
use Config;
use App\BaseHelpers;

abstract class AdminTemplateController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $modules = "";
    public $theme = "";

    public function __construct()
	{	
			$user = Auth::user();
			BaseHelpers::checkBaseModules();
			BaseHelpers::getAllModuleDetails();
			$this->modules = BaseHelpers::getModulesWithCategory();
			$this->theme = Config::get('modulemanagement.adminTheme');
			$cachedModules = Cache::get('modules');
			
			view()->share('modules', $this->modules);
			view()->share('theme', $this->theme);
			view()->share('user', $user);

	}
}
