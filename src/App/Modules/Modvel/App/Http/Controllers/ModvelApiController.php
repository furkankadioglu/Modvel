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

// Helpers
use App\Modules\Modvel\App\ModvelHelpers as ModuleHelpers;

// Models
use App\Modules\Modvel\App\Models\ModvelInformation;
use App\Modules\Modvel\App\Models\ModvelModule;
use App\Modules\Modvel\App\Models\ModvelModuleSetting;

class ModvelApiController extends Controller {

	public function index()
	{
		$datas = Modvel::orderBy('id', 'desc')->get();
		return $datas;
	}

	public function create()
	{
		 return response()->json(["target" => "create"]);
	}

	public function store(Request $request)
	{
		$postCategory = $request->get('postCategory');
		$apiPassword = $request->header('apiPassword');

		if($apiPassword == Config::get('modulemanagement.apiPassword'))
		{
			if($postCategory == "create")
			{
		 		return response()->json(["target" => "create"]);
			}
		}
	}

	public function show($id)
	{
		 return response()->json(["target" => "show"]);
	}

	public function edit($id)
	{
		 return response()->json(["target" => "edit"]);
	}

	public function update($id)
	{
		 return response()->json(["target" => "update"]);
	}

	public function destroy($id)
	{
		 return response()->json(["target" => "destroy"]);
	}

}
