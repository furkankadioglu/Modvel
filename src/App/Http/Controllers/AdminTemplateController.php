<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use File;
use Auth;
use Config;
use Cache;
use App\BaseHelpers;
use App\Modules\Modvel\App\ModvelHelpers;

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

			$panelbold = ModvelHelpers::getInformation('administratorpanelnamebold');
			$panelwhite = ModvelHelpers::getInformation('administratorpanelnamewhite');
			$brandname = ModvelHelpers::getInformation('brand-name');
			$panelname = ModvelHelpers::getInformation('administratorpanelname');

			$adminModuleCategories = BaseHelpers::getAdminModuleCategories();
			
			view()->share('modules', $this->modules);
			view()->share('theme', $this->theme);
			view()->share('user', $user);
			view()->share('panelbold', $panelbold);
			view()->share('panelwhite', $panelwhite);
			view()->share('panelname', $panelname);
			view()->share('brandname', $brandname);
			view()->share('adminModuleCategories', $adminModuleCategories);

	}
}
