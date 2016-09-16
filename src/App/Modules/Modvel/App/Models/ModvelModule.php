<?php namespace App\Modules\Modvel\App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Modvel\App\Models\ModvelModuleDetail;
class ModvelModule extends Model {

	//
	protected $table = "modvel_modules";
	public $timestamps = true;
	protected $guarded = [];

	public function sameCategoryModules()
	{
		return $this->hasMany("App\Modules\Modvel\App\Models\ModvelModule", "category", "category");
	}
	public function adminNavigationLinks()
	{
		$id = $this->attributes["id"];
		$links = ModvelModuleDetail::where('category', 'adminNavigationLinks')->where('moduleId', $id)->get();
		return $links;

	}

}
