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

// Helpers
use App\BaseHelpers;
use App\Modules\Modvel\App\ModvelHelpers as ModuleHelpers;

// Models
use App\Modules\Modvel\App\Models\ModvelInformation;
use App\Modules\Modvel\App\Models\ModvelModule;
use App\Modules\Modvel\App\Models\ModvelModuleDetail;


use App\Http\Controllers\AdminTemplateController;
class ModvelModulesAdminController extends AdminTemplateController {

	public $headName = "Modvel Module Informations";


	public function index()
	{
		$datas = ModvelModule::get();
		return view("Modvel::admin.".$this->theme.".modules.index")
		->with('datas', $datas)
		->with('headName', $this->headName);
	}

	public function create()
	{
		return view("Modvel::admin.".$this->theme.".modules.create")
		->with('headName', $this->headName);
	}

	public function store(Request $request)
	{
		$postCategory = $request->get('postCategory');

		if($postCategory == "create")
		{
			$moduleDetails = BaseHelpers::createModule($request->file('file'));
			
			$module = ModvelModule::create([
					'name' => $moduleDetails["name"],
					'description' => $moduleDetails["description"],
					'category' => $moduleDetails["category"],
					'customer' => $moduleDetails["customer"],
					'icon' => $moduleDetails["icon"],
					'version' => $moduleDetails["version"],
					'adminDisplayName' => $moduleDetails["adminDisplayName"],
					'adminVisible' => $moduleDetails["adminVisible"],
					'adminDisplayOrder' => 0,
					'displayName' => $moduleDetails["displayName"],
					'displayVisible' => $moduleDetails["displayVisible"],
					'displayOrder' => $moduleDetails["displayOrder"]
			]);


			foreach($moduleDetails as $k => $v)
			{
				if(is_array($v))
				{
					if($v != [])
					{
						foreach($v as $key => $value)
						{
							$detail = new ModvelModuleDetail;
							$detail->moduleId = $module->id;
							$detail->category = $k;
							$detail->key = $key;
							$detail->value = $value;
							$detail->save();
						}
					}
					

				}
			}
			$datas = ModvelModule::get();
			return view("Modvel::admin.".$this->theme.".modules.index")
			->with('datas', $datas)
			->with('headName', $this->headName);


		}

		$datas = ModvelModule::get();
		return view("Modvel::admin.".$this->theme.".modules.index")
		->with('datas', $datas)
		->with('headName', $this->headName);
	}


}
