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

use App\Models\Audio;
use App\Models\Photo;
use App\Models\Video;
use App\Models\UploadedFile;
use App\Models\Document;



use App\Http\Controllers\AdminTemplateController;
class ModvelFilesAdminController extends AdminTemplateController {

	public $headName = "Modvel File Types";


	public function index()
	{

		$configVariables = ["locale", "fallback_locale", "timezone"];
		foreach($configVariables as $cv)
		{
			$datas[$cv] = Permacon::get("app", $cv);
		}
		return view("Modvel::admin.".$this->theme.".files.index")
		->with('datas', $datas)
		->with('headName', $this->headName);
	}

	public function show($id)
	{
		if($id)
		{
			if($id == "photos")
			{
				$datas = Photo::get();
			}
			elseif($id == "videos")
			{
				$datas = Video::get();
			}
			elseif($id == "documents")
			{
				$datas = Document::get();
			}
			elseif($id == "audios")
			{
				$datas = Audio::get();
			}
			elseif($id == "uploadedfiles")
			{
				$datas = UploadedFile::get();
			}

			return view("Modvel::admin.".$this->theme.".files.show")
			->with('datas', $datas)
			->with('headName', $this->headName);

		}
	}

}
