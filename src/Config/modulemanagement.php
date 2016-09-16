<?php
/************************
*
*	Rys - Furkan Kadıoğlu
*	February - 2016	
*	http://github.com/furkankadioglu
*
*************************/

return [
	
	'path' => app_path('Modules'),

	'apiPassword' => env('API_PASSWORD', '123456'),

	'checkTime' => 30, // Minute 
	
	'modules' => 'App\Modules\\',
	
	'theme' => 'default',
	
	'adminTheme' => 'default',

    'baseModules' => array(
    	'Users',
    	'Main'
    )
];