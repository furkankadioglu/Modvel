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

		$this->deleteDir($path);

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

	private function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}


}
