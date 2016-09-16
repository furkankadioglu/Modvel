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


use App\Http\Controllers\MainTemplateController;
class ModvelController extends MainTemplateController {

	public function index()
	{
		$datas = Modvel::orderBy('id', 'desc')->get();
		return view("Modvel::".$this->theme.".index")
		->with('datas', $datas);
	}

	public function show($id)
	{
		$data = Modvel::find($id);
		if($data != null)
		{
			return view("Modvel::".$this->theme.".show")
			->with('id', $id)
			->with('data', $data);	
		}
		return back();
	}

	public function store(Request $request)
	{
		return back();
	}

	public function destroy($id)
	{
		return view("Modvel::".$this->theme.".destroy")
		->with('id', $id);
	}

	public function create()
	{
		return back();
	}

	public function update($id)
	{
		return back();
	}

	public function edit($id)
	{
		return back();
	}

}
