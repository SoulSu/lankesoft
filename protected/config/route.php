<?php


$route = array(
    'urlFormat' => 'path',
    'urlSuffix' => '.html',
    'showScriptName' => false,
    'rules' => array(

        'gii' => 'gii',
        'gii/<controller:\w+>' => 'gii/<controller>',
        'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',

//        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
//        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    ),
);

$adminRoute = require(dirname(__FILE__) . '/../modules/admin/route/admin-route.php');
$apiRoute = require(dirname(__FILE__) . '/../modules/api/route/api-route.php');

$route['rules'] = array_merge($route['rules'], $adminRoute, $apiRoute);

return $route;