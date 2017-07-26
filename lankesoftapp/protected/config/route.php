<?php


return array(
    'urlFormat'=>'path',
    'rules'=>array(

        'gii'=>'gii',
        'gii/<controller:\w+>'=>'gii/<controller>',
        'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

        // admin route
        'admin/login'=>'admin/default/login',
    ),
);