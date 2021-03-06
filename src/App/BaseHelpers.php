<?php 
namespace App;

use Carbon;
use File;
use Image;
use Cache;
use Config;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Document;
use App\Models\Audio;
use App\Models\UploadedFile;
use Zipper;


use App\Modules\Modvel\App\Models\ModvelModule;
use App\Modules\Modvel\App\Models\ModvelModuleDetail;

class BaseHelpers {

	public static function getAllModules()
	{
		return ModvelModule::get();
	}

	public static function getAdminModuleCategories()
	{
		return ModvelModule::groupBy('category')->get(['category']);
	}

	public static function getModuleDetails($id)
	{
		return ModvelModuleDetail::where('moduleId', $id)->get();
	}

	public static function getSameModuleCategory($categoryName)
	{
		return ModvelModule::where('category', $categoryName)->get(["category"]);
	}


	public static function cacheAddOrUpdate($module, $name, $val)
	{
		if($name != null)
		{
			$cache = Cache::get($module."Module-".$name);
			if(Cache::has($module."Module-".$name))
			{
				Cache::pull($module."Module-".$name);
				Cache::forever($module."Module-".$name, $val);
			}
			else
			{
				Cache::forever($module."Module-".$name, $val);
			}
		}
		else
		{
			$cache = Cache::get($module."Module");
			if(Cache::has($module."Module"))
			{
				Cache::pull($module."Module");
				Cache::forever($module."Module", $val);
			}
			else
			{
				Cache::forever($module."Module", $val);
			}
		}
		
	}

	public static function checkBaseModules()
	{
		
		$baseModules = Config::get('modulemanagement.baseModules');
		$path = Config::get('modulemanagement.path');
		$moduleCheck = Cache::get('moduleCheck');

		if($moduleCheck != 1)
		{
			foreach($baseModules as $module)
			{
				if(file_exists($path.'/'.$module))
				{
				}
				else
				{
					echo "Please check base modules for system start.";
					die();
				}
				$cacheModules = Cache::put('moduleCheck', '1', Config::get('modulemanagement.checkTime'));
			}
		}
		
	}

	public static function getAllModuleDetails()
	{
		$path = Config::get('modulemanagement.path');
		$moduleCheck = Cache::get('moduleCheckAdmin');
	   	$directories = "";
	    $modules = [];
	    if($moduleCheck != 1)
		{
		    if(File::exists($path)) 
		    {
   			    $directories = array_map('basename', File::directories($path));
		     	foreach($directories as $directory)
		     	{
					$modules[$directory] = BaseHelpers::readModule($directory);
		     	}
		     	if($modules == "[]")
		     	{
		     		die("ERROR");
		     	}
				$cacheModules = Cache::put('moduleCheckAdmin', '1', Config::get('modulemanagement.checkTime') * 3);
				$cacheModulesList = Cache::put('modules', $modules, Config::get('modulemanagement.checkTime') * 3);

		     	return $modules;
		    }
		}
		$modules = Cache::get('modules');

		return $modules;
	}

	public static function getModulesWithCategory()
	{

		$path = Config::get('modulemanagement.path');
		$moduleCheck = Cache::get('modulesWithCategory');
	   	$directories = "";
	    $modules = [];
	    $results = [];
	    if($moduleCheck != 1)
		{
		    if(File::exists($path)) 
		    {
   			    $directories = array_map('basename', File::directories($path));
		     	foreach($directories as $directory)
		     	{
					$modules[$directory] = BaseHelpers::readModule($directory);
					$category = $modules[$directory]["category"];
					$results[$category][$directory] = $modules[$directory];

					if(isset($modules[$directory]["name"]))
					{
						BaseHelpers::cacheAddOrUpdate($modules[$directory]["name"], null, 1);
					}
		     	}
		     	if($modules == "[]")
		     	{
		     		die("ERROR");
		     	}
				$cacheModules = Cache::put('modulesWithCategory', '1', Config::get('modulemanagement.checkTime') * 3);
				$cacheModulesList = Cache::put('modulesWithCategoryList', $results, Config::get('modulemanagement.checkTime') * 3);

		     	return $results;
		    }
		}
		$modules = Cache::get('modulesWithCategoryList');

		return $modules;
	}

	public static function getModulesWithSearch($parametre1, $parametre2)
	{

		$path = Config::get('modulemanagement.path');
		$moduleCheck = Cache::get($parametre1.$parametre2.'Search');
	   	$directories = "";
	    $modules = [];
	    $results = [];
	    if($moduleCheck != 1)
		{
		    if(File::exists($path)) 
		    {
   			    $directories = array_map('basename', File::directories($path));
		     	foreach($directories as $directory)
		     	{
					$modules[$directory] = BaseHelpers::readModule($directory);
					if($modules[$directory][$parametre1] == $parametre2)
					{
						$results[$directory] = $modules[$directory];
					}
		     	}
		     	if($modules == "[]")
		     	{
		     		die("ERROR");
		     	}
				$cacheModules = Cache::put($parametre1.$parametre2.'Search', '1', Config::get('modulemanagement.checkTime') * 3);
				$cacheModulesList = Cache::put($parametre1.$parametre2, $results, Config::get('modulemanagement.checkTime') * 3);

		     	return $results;
		    }
		}
		$modules = Cache::get($parametre1.$parametre2);

		return $modules;
	}

	public static function createModule($data)
	{
		if(!is_null($data))
		{	
			$time = Carbon\Carbon::now()->timestamp;
			$extension = $data->getClientOriginalExtension();
			$mediaName = ($time.rand(5, 200000));
			$fileName = $mediaName.".".$extension;
			$data->move(public_path().'/uploads/modules/', $fileName);
			$displayName = $mediaName;

			$uploadedFile = UploadedFile::create([
				'displayName' => $displayName,
				'fileName' => $fileName,
				'categoryName' => "UncategorizedModules",
				'relId' => 0,
			]);
			$files = Zipper::make(public_path().'/uploads/modules/'.$fileName)->listFiles();
			$export = Zipper::make(public_path().'/uploads/modules/'.$fileName)->extractTo(app_path().'/Modules');
			$detailsFile = "";
			foreach($files as $file)
			{
				//details.php
				$detailsphp = substr($file, -11);
				if($detailsphp == "details.php")
				{
					$detailsFile = $file;
				}
			}

			if($detailsFile == "")
			{
				return redirect('/');
			}
			$path = include(app_path().'/Modules/'.$detailsFile);

			return $path;
		}
	}

	public static function readModule($modulename)
	{
	    $path = include(app_path().'/Modules/'.$modulename.'/details.php');
	    return $path;
	}


	public static function addPhoto($data, $relationshipId = null, $categoryName = null, $displayName = null)
	{
		$pixelFormats = [350,300,200,125, 75, 25];
		if(!is_null($data))
		{	
			$time = Carbon\Carbon::now()->timestamp;
			$media= \Image::make($data);
			$extension = $data->getClientOriginalExtension();
			$mediaName = ($time.rand(5, 200000));
			$fileName = $mediaName.".".$extension;
			$media->save(public_path().'/uploads/photos/'.$fileName, 60);

			foreach($pixelFormats as $format)
			{
				$media->resize($format, null, function ($constraint) 
				{
					$constraint->aspectRatio();
				});
				$media->save(public_path().'/uploads/photos/'.$format.'px_'.$fileName, 60);
			}


			if(is_null($displayName))
			{
				$displayName = $mediaName;
			}
			if(is_null($relationshipId))
			{
				$relationshipId = 0;
			}


			$mediaCreate = Photo::create([
				'displayName' => $displayName,
				'fileName' => $fileName,
				'categoryName' => $categoryName,
				'relId' => $relationshipId
			]);

			return $mediaCreate;
		}
	}

	public static function addVideo($data, $relationshipId = null, $categoryName = null, $displayName = null)
	{
		if(!is_null($data))
		{	
			$time = Carbon\Carbon::now()->timestamp;
			$extension = $data->getClientOriginalExtension();
			$mediaName = ($time.rand(5, 200000));
			$fileName = $mediaName.".".$extension;
			$data->move(public_path().'/uploads/videos/', $fileName);
			if(is_null($displayName))
			{
				$displayName = $mediaName;
			}
			if(is_null($relationshipId))
			{
				$relationshipId = 0;
			}
			$mediaCreate = Video::create([
				'displayName' => $displayName,
				'fileName' => $fileName,
				'categoryName' => $categoryName,
				'relId' => $relationshipId
			]);

			return $mediaCreate;
		}
	}
	public static function addAudio($data, $relationshipId = null, $categoryName = null, $displayName = null)
	{
		if(!is_null($data))
		{	
			$time = Carbon\Carbon::now()->timestamp;
			$extension = $data->getClientOriginalExtension();
			$mediaName = ($time.rand(5, 200000));
			$fileName = $mediaName.".".$extension;
			$data->move(public_path().'/uploads/audios/', $fileName);
			if(is_null($displayName))
			{
				$displayName = $mediaName;
			}
			if(is_null($relationshipId))
			{
				$relationshipId = 0;
			}
			$mediaCreate = Audio::create([
				'displayName' => $displayName,
				'fileName' => $fileName,
				'categoryName' => $categoryName,
				'relId' => $relationshipId
			]);

			return $mediaCreate;
		}
	}
	public static function addDocument($data, $relationshipId = null, $categoryName = null, $displayName = null)
	{
		if(!is_null($data))
		{	
			$time = Carbon\Carbon::now()->timestamp;
			$extension = $data->getClientOriginalExtension();
			$mediaName = ($time.rand(5, 200000));
			$fileName = $mediaName.".".$extension;
			$data->move(public_path().'/uploads/documents/', $fileName);
			if(is_null($displayName))
			{
				$displayName = $mediaName;
			}
			if(is_null($relationshipId))
			{
				$relationshipId = 0;
			}
			$mediaCreate = Document::create([
				'displayName' => $displayName,
				'fileName' => $fileName,
				'categoryName' => $categoryName,
				'relId' => $relationshipId
			]);

			return $mediaCreate;
		}
	}

}