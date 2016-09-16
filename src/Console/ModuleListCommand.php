<?php namespace furkankadioglu\Modvel\Console;

/************************
*
*	Rys - Furkan Kadıoğlu
*	May - 2016	
*	http://github.com/furkankadioglu
*
*************************/

use Illuminate\Console\Command;

class ModuleListCommand extends Command {

	protected $name = 'module:list';
	protected $description = 'Return all registered modules.';
	protected $type = 'Module';


	public function fire()
	{
		$this->info('+ Scanning modules');
		//$this->info('+ Scanning modules');
		if(is_dir(app_path().'/Modules/')) 
		{
			$modules = array_slice(scandir(app_path().'/Modules/'), 2);
			foreach($modules as $module)  
			{
				$this->warn('- Detected module: '.$module);
			}
			$this->info('* Modules Count: '.count($modules));
		}
		$this->info('* The scanning process is completed.');
	}


}
