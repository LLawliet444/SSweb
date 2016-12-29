<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/19
 * Time: 21:46
 */

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
    function _initialize(){
//        session_start();
        $session_name = session_name();
//        dump($session_name);
//        die();
        if(isset($_POST[$session_name])){
            session('[pause]');
            session_id($_POST[$session_name]);
            session_start();
        }
        if(!isset($_SESSION['uinfo'])){
            $this->error('您尚未登录，请先登录！',U('Index/login'),3);
        }
    }
    //设置系统信息
    function sysSet($uid,$tid,$type){
        $systerm = D('Systerm');
        $data['from_uid'] = $uid;
        $data['state_id'] = $tid;
        $data['sys_type'] = $type;
        $data = $systerm->create($data);
//        dump($data);
        if($systerm->add($data)){
            return 0;
        }else{
            return 1;
        }
    }

    //重置session中保存的用户信息
    function sessionFlush($id){
        $user = D('user1');
        $_SESSION['uinfo'] = $user->find($id);
    }
}