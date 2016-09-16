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
use App\Modules\Modvel\App\Models\ModvelModuleSetting;


use App\Http\Controllers\AdminTemplateController;
class ModvelAdminSettingsController extends AdminTemplateController {

	public $headName = "Modvel Module Settings";


	public function index()
	{
		$datas = ModvelModuleSetting::orderBy('id', 'desc')->get();
		return view("Modvel::admin.".$this->theme.".settings.index")
		->with('datas', $datas)
		->with('headName', $this->headName);
	}

	public function create()
	{
		return view("Modvel::admin.".$this->theme.".settings.create")
		->with('headName', $this->headName);
	}

	public function store(Request $request)
	{
		$postCategory = $request->get('postCategory');

		if($postCategory == "create")
		{
			$rules = array(
				'displayName' => 'required|max:255',
				'name' => 'required|unique:Modvel_settings|max:255',
				'attribute' => 'required|max:255'
			);

			$validator = Validator::make($request->all(), $rules);

			if($validator->fails()) 
            {
				return back()->withErrors($validator);
            }

            $settingDisplayName = $request->get('displayName');
            $settingName = str_slug($request->get('name'));
            $settingAttribute = $request->get('attribute');

			$data = ModvelModuleSetting::create([
				'displayName' => $settingDisplayName,
				'name' => $settingName,
				'attribute' => $settingAttribute
			]);

			$withCache = BaseHelpers::cacheAddOrUpdate("Modvel" ,$settingName, "");

            return redirect("admin/modules/Modvel/settings");
		}

		return back();
	}

	public function update(Request $request)
	{
		$settings = ModvelModuleSetting::orderBy('id', 'desc')->get();
		foreach($settings as $setting)
		{
			$setting->value = $request->get($setting->name);
			$setting->save();
			$withCache = BaseHelpers::cacheAddOrUpdate("Modvel", $setting->name, $setting->value);
		}
           return redirect("admin/modules/Modvel/settings");
	}

	public function destroy($id)
	{
		$data = ModvelModuleSetting::find($id);
		if($data != null)
		{
			$data->delete();
			Cache::pull("ModvelModule-".$data->name);
		}
		return back();

		
	}

}
