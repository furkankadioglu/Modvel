<?php
/*
|--------------------------------------------------------------------------
|
|   Modvel Module
|
|--------------------------------------------------------------------------
*/

return [

    // General
    
    'name' => 'Modvel',
    'description' => '',
    'creator' => 'Anonymous',
    'category' => 'General',
    'customer' => 'General',
    'icon' => 'fa fa-modx',
    'version' => '1.0.0',
    'optionalModules' => [

    ],
    'requiredModules' => [

    ],
    'requiredPackages' => [
        "anlutro/l4-settings" => "^0.4.8",
        "chumper/zipper" => "0.6.x"
    ],

    // Admin

    'adminDisplayName' => 'Modvel Configrations',
    'adminVisible' => 1,
    'adminDisplayOrder' => 0,
    'adminNavigationLinks' => [
        'Moduller' => '/modules/',
    	'Bilgiler' => '/informations/',
        'Ayarlar' => '/settings/',
        'Config' => '/config/',
        'Files' => '/files/',
    ],
    
    // Visitor

    'displayName' => 'Modvel',
    'displayVisible' => 1,
    'displayOrder' => 0,
    'displayNavigationLinks' => [

    ],


];