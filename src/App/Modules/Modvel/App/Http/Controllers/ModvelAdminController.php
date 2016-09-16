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


use App\Http\Controllers\AdminTemplateController;
class ModvelAdminController extends AdminTemplateController {

	public $headName = "Modvel";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ways = array('informations', 'modules');
        return redirect("admin/modules/Modvel/".$ways[array_rand($ways)]);
    }

}
