<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/17
 * Time: 21:08
 */

namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
    //登录界面
    function login(){
        $this->display();
    }
    //用户登录
    function loginHandle(){
        $user1 = D('User1');
        $user_name = I('post.username');
        $pwd = I('post.pwd');
        $pwd = setMd5($pwd);
        $data = $user1->where("user_name='%s' or user_email='%s' or user_tel='%s'",array($user_name,$user_name,$user_name))->find();
        if($data){
            if($data['user_pwd']==$pwd){
                $this->success('登录成功！',U('Main/index'),3);
                $_SESSION['uinfo'] = $data;
                //登录保存一周
                if (isset($_POST['save']) && $_POST['save'] == 'save') {
                    //COOKIE生存时间
                    $lifeTime = 3600*24*7;
                    setcookie(session_name(),session_id(),time()+$lifeTime,"/");
                }
            }else{
                $this->error('密码错误',U('login'),3);
            }
        }else{
            $this->error('账号不存在！',U('login'),3);
        }
//        dump($data);
    }
    //用户登录ajax验证用户名是否存在
    function checkLogUser(){
        $user1 = D('User1');
        $user_email=$user_tel=$user_name = I('post.username');
        if(!$user_name){
            echo "用户名不可为空";
        }
        $data = $user1->where("user_name='%s' or user_email='%s' or user_tel='%s'",array($user_name,$user_email,$user_tel))->find();
        if(!$data){
            echo "用户名不存在";
        }
    }
    //退出登录
    function logOut(){
        //删除session里的值
        unset($_SESSION['uinfo']);
        setcookie(session_name(), '', time() - 1);
        session_destroy();
        $this->success('退出成功',U('login'),3);
    }
    //注册界面
    function register(){
        $this->display();
    }
    //用户注册
    function regOk(){
        $user1 = D('User1');
//        dump($user1);
        $data = $user1->create('',1);
        dump($_POST);
        dump($data);
        if(!$data){
            echo $user1->getError();
        }else{
            if($user1->add($data)){
                $this->success('注册成功！',U('login'),3);
            }else{
                $this->error('注册失败！',U('register'),3);
            }
        }
    }
    //注册时验证用户名是否重复
    function checkRegUser(){
        $username = I('post.username');
        if($username == ''){
            echo "用户名不可为空";
            die();
        }
        $user1 = D('User1');
        if($user1->where("user_name='".$username."'")->find()){
            echo "用户名已被注册，请更换一个！";
            die();
        }
        echo 'OK';
    }
    //注册时验证邮箱是否重复
    function checkRegEmail(){
        $email = I('post.email');
        if($email == ''){
            echo "邮箱不可为空";
            die();
        }
        $user1 = D('User1');
        if($user1->where("user_email='".$email."'")->find()){
            echo "该邮箱已被注册，请更换一个！";
            die();
        }
        echo 'OK';
    }
}