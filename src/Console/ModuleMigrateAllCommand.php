<?php namespace furkankadioglu\Modvel\Console;

/************************
*
*	Rys - Furkan Kadıoğlu
*	May - 2016	
*	http://github.com/furkankadioglu
*
*************************/

use Illuminate\Console\Command;

class ModuleMigrateAllCommand extends Command {

	protected $name = 'module:migrateall';
	protected $description = 'Migrate all module migration files.';
	protected $type = 'Module';


	public function fire()
	{
		if(is_dir(app_path().'/Modules/')) 
		{
			$modules = array_slice(scandir(app_path().'/Modules/'), 2);
			foreach($modules as $module)  
			{
				$path = 'app/Modules/'.$module.'/Database/migrations/';
				$this->warn('+ Scanning module migration files.');
				$this->call('migrate',  ['--path' => $path]);
				$this->info('* '.$module.' module migration completed.');
			}
		}
		$this->info('* Module migration completed.');
	}

}
