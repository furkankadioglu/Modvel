<?php namespace App\Modules\Modvel\App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Frameworks
use File;
use Auth;
use Validator;
use DB;
use Config;
use Cache;
use Permacon;
// Helpers
use App\BaseHelpers;
use App\Modules\Modvel\App\ModvelHelpers as ModuleHelpers;

// Models
use App\Modules\Modvel\App\Models\ModvelInformation;
use App\Modules\Modvel\App\Models\ModvelModule;


use App\Http\Controllers\AdminTemplateController;
class ModvelConfigAdminController extends AdminTemplateController {

	public $headName = "Modvel Config Settings";


	public function index()
	{

		$configVariables = ["locale", "fallback_locale", "timezone"];
		foreach($configVariables as $cv)
		{
			$datas[$cv] = Permacon::get("app", $cv);
		}
		return view("Modvel::admin.".$this->theme.".config.index")
		->with('datas', $datas)
		->with('headName', $this->headName);
	}

	public function create()
	{
		return view("Modvel::admin.".$this->theme.".informations.create")
		->with('headName', $this->headName);
	}

	public function store(Request $request)
	{

	

		$base = $request->get('base');
		$arrays = $request->get('arrays');


		foreach($base as $b => $v)
		{

			Permacon::set("app", $b, $v);
		}


        return redirect("admin/modules/Modvel/config");
	}



	public function destroy($id)
	{
		
	}

}
