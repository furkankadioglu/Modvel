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

   		    
			view()->share('modules', $this->modules);
			view()->share('theme', $this->theme);
	}

}
