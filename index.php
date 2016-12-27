<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/3
 * Time: 18:26
 */
//文件头
header('Content-Type:text/html;charset=utf-8');
//指定项目目录
define('APP_PATH','./application/');
//开启报错
define('APP_DEBUG',true);
//引入ThinkPHP核心文件
include_once('./ThinkPHP/ThinkPHP.php');

//include_once('./application/Admin/Controller/TestController.class.php');
//include_once('./application/Home/Controller/TestController.class.php');
////use Home\Controller\TestController;
//$ss = new Admin\Controller\TestController();
//echo "<br>";
//$ss->add();
