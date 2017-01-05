<?php
return array(
    //'配置项'=>'配置值'
    'TMPL_PARSE_STRING'=> array(
        '__HOME__' => '/Public/Home',
        '__HOMECSS__' => '/Public/Home/css',
        '__HOMEJS__' => '/Public/Home/js',
        '__HOMEIMG__' => '/Public/Home/images',
        '__COMMON__' => '/Public/Common',
    ),
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'myss',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'ss_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    //分页
    'PAGESIZE' => 2,
    //关闭页面trace
    'SHOW_PAGE_TRACE' => false,

);