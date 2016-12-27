<?php
return array(
	//'配置项'=>'配置值'
    'LOAD_EXT_FILE' => 'myfunc',
    'URL_MODEL' => 2,
    'SHOW_PAGE_TRACE' => true,
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Main', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index',
    'URL_HTML_SUFFIX'       =>  'html',  // URL伪静态后缀设置
    'MODULE_DENY_LIST'      =>  array('Common','Runtime'),
    'MODULE_ALLOW_LIST'      =>  array('Admin','Home'),
);