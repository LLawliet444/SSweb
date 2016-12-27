<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/17
 * Time: 20:55
 */
//设置日期
function setDate(){
    return date('Y-m-d');
}
//密码加密
function setMd5($data){
    return md5($data);
}
//设置时间
function setDateTime(){
    return date('Y-m-d H:i:s');
}
//设置时间戳
function getTimeStamp(){
    return time();
}
//获取当前用户id值
function getUserId(){
    return $_SESSION['uinfo']['user_id'];
}