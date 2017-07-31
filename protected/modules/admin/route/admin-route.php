<?php


$routeNav = array(
    'solution',
    'product',
    'productdemo',
    'question',
    'projectcase',
    'profiledownload',
    'userManage',
    'clientManage',
    'team',
    'life',
    'indexdemo',
    'vip',
    'vipproduction'
);


return array(
    // 解决方案 // 产品列表
    '<controller:(' . implode('|', $routeNav) . ')>/<action:(list|add|edit|delete)>' =>
        'admin/<controller>/<action>',

    // 文件上传
    'admin/fileupload' => 'admin/site/upload',

    'admin' => 'admin/site/index',
    'admin/<action:\w+>' => 'admin/site/<action>',
    'admin/<controller:\w>/<action:\w+>' => 'admin/<controller>/<action>',


//    'admin/<controller:\w>/<action:\w+>'=> array(
//        'admin/<controller>/<action>',
//        'urlSuffix' => '.html'
//    )

);

