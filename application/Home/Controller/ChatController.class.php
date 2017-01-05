<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/30
 * Time: 21:29
 */

namespace Home\Controller;
use Org\Net\IpLocation;
use Think\Controller;

class ChatController extends Controller{
    private $redis;
    function _initialize(){
        //实列化
        $this->redis = new \Redis();
        //连接redis
        $this->redis->connect('127.0.0.1',6379);
    }
    function index(){
        $user1 = D('User1');
        $user = $user1->find($_SESSION['uinfo']['user_id']);
        $friends = $user['user_attention'].','.$user['user_fans'];
        $data = $user1->where('user_id in ('.$friends.')')->field('user_id,user_nickname,user_smallheader')->select();
//        dump($data);
        $this->assign('data',$data);
        $this->display();
    }

    function getMsg(){
        $fromid = I('post.userid');
        $id = $_SESSION['uinfo']['user_id'];
        //查询用户昵称和头像
        $user1 = D('User1');
        $user = $user1->field('user_id,user_header,user_nickname')->find($fromid);
        //查询对方发送来的信息
        $num = $this->redis->lsize($id);
        //存放发送来的信息
        $msg1 = array();
        for($i = 0;$i < $num;$i++) {
            $data = $this->redis->lget($id, $i);
            $data = json_decode($data, true);
            if ($data['fromid'] == $fromid) {
                //设置为已读
                $data['isread'] = 1;
                $msg1[] = $data;
                $data = json_encode($data);
                $this->redis->lset($id, $i, $data);
            }
        }
        //查询自己已发送的信息
        $num = $this->redis->lsize($fromid);
        //存放发送来的信息
        $msg2 = array();
        for($i = 0;$i < $num;$i++){
            $data = $this->redis->lget($fromid,$i);
            $data = json_decode($data,true);
            if($data['fromid'] == $id){
                $msg2[] = $data;
            }
        }
        //合并数组并根据时间进行排序
        $msg = array_merge($msg1,$msg2);
        $data = array();
        foreach($msg as $key => $val){
            $data[$key] = $val['time'];
        }
        asort($data);
//        dump($data);
//        die();
        foreach ($data as $key => $value) {
            $data[$key] = $msg[$key];
        }
//        dump($data);
//        die();
        $this->assign('user',$user);
        $this->assign('data',$msg);
        $this->display();
    }

    function setMsg(){
        $content = I('post.message');
        $id = I('post.userid');
//        $this->redis->delete($id);
//        die();
        $fromid = $_SESSION['uinfo']['user_id'];
        $arr['content'] = $content;
        $arr['fromid'] = $fromid;
        $arr['time'] = time();
        $arr['isread'] = 0;
        $arr['toid'] = $id;
        $msg = json_encode($arr);
        if($this->redis->rpush($id,$msg)){
            $this->assign('arr',$arr);
            $this->display();
        }else{
            echo 'ERROR';
        }
    }

    function catchMsg(){
        
    }
}
