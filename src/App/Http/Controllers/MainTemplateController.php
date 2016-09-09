<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use File;
use Auth;
use Cache;
use Config;
use App\BaseHelpers;
use App\Modules\Pages\App\Models\Page;
use App\Modules\Modvel\App\ModvelHelpers;

abstract class MainTemplateController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $theme = "";
    public $modules = "";

    public function __construct()
	{	
			BaseHelpers::checkBaseModules();
			$this->modules = BaseHelpers::getAllModuleDetails();
			$this->theme = Config::get('modulemanagement.theme');

			$menuPages = Page::where('showMenu', 1)->where('masterPageId', 0)->get();
			$brandname = ModvelHelpers::getInformation('brand-name');

			$mainModuleCategories = BaseHelpers::getAdminModuleCategories();
   		    
			view()->share('modules', $this->modules);
			view()->share('theme', $this->theme);
			view()->share('menuPages', $menuPages);
			view()->share('brandname', $brandname);
			view()->share('mainModuleCategories', $mainModuleCategories);
	}

}
