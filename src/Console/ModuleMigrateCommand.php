<?php namespace furkankadioglu\Modvel\Console;

/************************
*
*	Rys - Furkan Kadıoğlu
*	May - 2016	
*	http://github.com/furkankadioglu
*
*************************/

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ModuleMigrateCommand extends Command {

	protected $name = 'module:migrate';
	protected $description = 'Migrate a module.';
	protected $type = 'Module';

	public $moduleName = "";


	public function fire()
	{
		$this->moduleName = $this->ucwordsArgument('moduleName');
		$path = 'app/Modules/'.$this->moduleName.'/Database/migrations/';
		$this->warn('+ Scanning module migration files.');
		$this->call('migrate',  ['--path' => $path]);
		$this->info('* Module migration completed.');
	}

	protected function getArguments()
	{
		return [
			['moduleName', InputArgument::REQUIRED, 'Module name.']
		];
	}

	protected function ucwordsArgument($arg)
	{
		return $this->argument($arg);
	}


}
