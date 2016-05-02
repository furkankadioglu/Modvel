<?php namespace furkankadioglu\Modvel\Console;

/************************
*
*	Rys - Furkan Kadıoğlu
*	May - 2016	
*	http://github.com/furkankadioglu
*
*************************/

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ModuleMakeCommand extends GeneratorCommand {

	protected $name = 'module:make';
	protected $description = 'Create a new module';
	protected $type = 'Module';

	public $moduleName = "";
	public $modulesPath = "";
	public $modulePath = "";
	public $modulePathFolder = "";

	// Generate - Folders
	public $folders = [
		'App'	=> 	[
			'Http'	=>	[
				'Controllers' 	=> 	[],
				'Middlewares' 	=> 	[]
			],
			'Models'	=> 	[]
		],
		'Config'	=> 	[],
		'Resources' => 	[
			'views' => 	[
				'admin'	=>	[
					'default'	=>	[]
					],
					'default'	=> 	[]
			],
			'lang' => [
				'tr' 	=> 	[],
				'en' 	=> 	[]
			]
		],
		'Database'		=> [
			'seeds'			=>	[],
			'migrations' 	=> 	[]
		]
	];

	// File Replacement
	public $fileRenameRules = [
		'AdminController.stub' 					=> 'DummyAdminController.php',
		'ApiController.stub' 					=> 'DummyApiController.php',
		'Controller.stub' 						=> 'DummyController.php',
		'Model.stub' 							=> 'Dummy.php',
		'general.stub'							=> 'general.php',
		'index.stub' 							=> 'index.blade.php',
		'routes.stub'							=> 'routes.php',
		'details.stub'							=> 'details.php',
		'helper.stub'							=> 'DummyHelpers.php',
		'show.stub'								=> 'show.blade.php',
		'edit.stub'								=> 'edit.blade.php',
		'create.stub'							=> 'create.blade.php',
		'destroy.stub'							=> 'destroy.blade.php',
		'2016_01_01_010101_Dummy.stub'			=> '2016_01_01_010101_Dummy.php'
	];



	public function fire()
	{
		$this->moduleName = $this->getNameInput();
		$this->modulePath = $this->moduleName;
		$this->modulesPath = app_path().'/Modules/';

		// Exist control
		if($this->files->exists($this->modulesPath.$this->modulePath))
		{
			return $this->error($this->type.' already exists!');
		} 

		$this->generateFolder($this->folders, $this->moduleName, "", null);

		$this->info('* '.$this->moduleName.' module created successfully.');
	}

	private function generateFolder($data, $moduleName ,$path, $filepath = null)
	{
		foreach($data as $basefolder => $subfolders)
		{
			$generateFolder = app_path().'/Modules/'.$moduleName.'/'.$path.'/'.$basefolder.'/ ';
			$this->makeDirectory($generateFolder);
			$this->warn("+ Directory Generated:	".$generateFolder);


			$mPath = app_path().'/Modules/'.$moduleName.'/';
			$stubPath = __DIR__.'/stubs/'.$path.$basefolder;
			$stubPathDirectory = __DIR__.'/stubs/';

			// Module Files
			foreach((array)$this->findFiles($stubPathDirectory) as $file)
			{
				$this->generateFile($file, $moduleName, $mPath, $stubPathDirectory);
			}
			
			// Module Directory Files
			foreach((array)$this->findFiles($stubPath) as $file)
			{
				$this->generateFile($file, $moduleName, $generateFolder, $stubPath);
			}
			
			// Module Directory Folders (loop)
			if(isset($subfolders))
			{
				$this->generateFolder($subfolders, $this->moduleName, $path.'/'.$basefolder.'/');
			}
		}
	}

	private function generateFile($file, $moduleName, $generateFolder, $stubPath)
	{
		if(substr($file, -5) == ".stub" && strlen($file) > 3)
		{
			$renamedfile = str_replace("Dummy", $moduleName, $this->fileRenameRules[$file]);
			$newfile = str_replace($file, $renamedfile, $file);
			$newFilePath = str_replace(" ", "", $generateFolder).$newfile;

			if(!$this->files->exists(str_replace(" ", "", $generateFolder).$newfile))
			{
				copy($stubPath."/".$file, str_replace(" ", "", $generateFolder).$newfile);
				$this->replacer("Dummy", $moduleName, $newFilePath);

				$this->warn("- File Generated:	".$newFilePath);
			}
		}
	}

	private function replacer($word, $replace, $path)
	{
		$file = file_get_contents($path);
		$file = str_replace($word, $replace, $file);
		$file = file_put_contents($path, $file);
	}

	private function findFiles($path)
	{
		if(is_dir($path))
		{
			return scandir($path);
		}
		return "";
	}

	protected function getStub() { }


}
