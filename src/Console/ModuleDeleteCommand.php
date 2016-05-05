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

class ModuleDeleteCommand extends Command {

	protected $name = 'module:delete';
	protected $description = 'Delete a module.';
	protected $type = 'Module';

	public $moduleName = "";


	public function fire()
	{
		$this->moduleName = $this->ucwordsArgument('moduleName');
		$path = 'app/Modules/'.$this->moduleName;
		$this->warn('+ Scanning module files.');

		array_map('unlink', glob("$path/*.*"));
		rmdir($path);

		$this->info('* Module has been removed.');
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
