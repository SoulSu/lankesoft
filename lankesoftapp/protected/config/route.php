<?php


$route = array(
    'urlFormat' => 'path',
    'urlSuffix' => '.html',
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

$adminRoute = require(PROJECT_ROOT_PATH . '/protected/modules/admin/route/admin-route.php');

$route['rules'] = array_merge($route['rules'], $adminRoute);

return $route;