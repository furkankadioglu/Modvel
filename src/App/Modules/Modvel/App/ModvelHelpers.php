<?php
namespace App\Modules\Modvel\App;
 /**
 *	Modvel Helper  
 */

use Cache;
use App\Modules\Modvel\App\Models\ModvelInformation;

 class ModvelHelpers
 {
 	public static function informationUpdateOrAdd($name, $val)
	{
			$cache = Cache::get($name);
			if(Cache::has($name))
			{
				Cache::pull($name);
				Cache::forever($name, $val);
			}
			else
			{
				Cache::forever($name, $val);
			}
	}

	 	public static function getInformation($name)
	{
			$data = Cache::get($name);

			if($data)
			{
				return $data;
			}
			else
			{
				$modvelData = ModvelInformation::where('name', $name)->first();
				if($modvelData)
				{
					return $modvelData->value;
				}
				else
				{
					return $data;
				}
			}
	}
 }