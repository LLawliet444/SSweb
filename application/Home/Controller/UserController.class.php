<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/18
 * Time: 20:11
 */

namespace Home\Controller;
//use Think\Controller;

class UserController extends CommonController{
    //个人主页
    function index(){
//        var_dump($_SESSION);
        $user1 = D('User1');
        $user_id = I('get.userid');
        if($user_id == $_SESSION['uinfo']['user_id']){
            $this->assign('uinfo',$_SESSION['uinfo']);
        }else{
            $data = $user1->where("user_id=$user_id")->find();
            //关注人数组
            $attenArr = $_SESSION['uinfo']['user_attention'];
            $attenArr = explode(',',$attenArr);
            //是否关注
            if(in_array($data['user_id'],$attenArr)){
                $data['aflag'] = 1;
            }else{
                $data['aflag'] = 0;
            }
            $this->assign('uinfo',$data);
        }
        $this->sysMsg();
        $this->display();
    }
    //用户最新动态
    function sysMsg(){
        $from_uid = I('get.userid');
        $systerm = D('Systerm');
        $user1 = D('User1');
        $smsg = D('Smsg');
        $up = D('Up');
        $data = $systerm->where('from_uid='.$from_uid)->order('sys_ctime desc')->limit(10)->select();
        foreach ($data as $key=>$value) {
            //关注事件
            if($value['sys_type'] == '1'){
                $data[$key]['ext'] = $user1->field('user_nickname,user_header')->find($value['state_id']);
            }
            //短状态事件
            if($value['sys_type'] == '2'){
                $smsg_list = $smsg->select($value['state_id']);
                $smsg_list = $this->smsgComple($smsg_list);
                $data[$key]['ext'] = $smsg_list[0];
            }
            //点赞事件
            if($value['sys_type'] == '4'){
                $up_msg = $up->find($value['state_id']);
                $smsg_list = $smsg->where('up_type=0')->select($up_msg['msg_id']);
                $smsg_list = $this->smsgComple($smsg_list);
                $smsg_list = $smsg_list[0];
                $user = $user1->field('user_nickname,user_header')->find($smsg_list['from_id']);
                $data[$key]['ext'] = array_merge($smsg_list,$user);
            }
        }
//        dump($data);
        $this->assign('data',$data);
//        $this->display();
    }
    //自己主页
    function myIndex(){
        $url = "http://www.project.com/User/index/userid/".$_SESSION['uinfo']['user_id'];
        Header("HTTP/1.1 303 See Other");
        Header("Location: $url");
        exit();
    }
    //短状态页面
    function smsgIndex(){
        $smsg = D('Smsg');
        //查询状态表
        $sql = "select s.*,u1.user_nickname,u1.user_header,u1.user_id from ss_smsg as s left join ss_user1 as u1 on s.from_id=u1.user_id where u1.user_id in (".$_SESSION['uinfo']['user_attention'].") order by s.smsg_ctime desc";
        $smsg_list = $smsg->query($sql);
        $smsg_list = $this->smsgComple($smsg_list);
//        dump($smsg_list);
        $this->assign('smsg_list',$smsg_list);
        $this->display();
    }
    //补全状态评论和点赞状态
    private function smsgComple($smsg_list){
        $up = D('Up');
        $comment = D('Comment');
        //查询点赞表
        $user_id = $_SESSION['uinfo']['user_id'];
        //遍历两个表，设置是否点过赞的flag
        foreach($smsg_list as $key=>$val){
            $data = $up->where("user_id=$user_id and msg_id=".$val['smsg_id']."     and up_type=0")->select();
            if($data){
                $smsg_list[$key]['flag'] = 1;
            }else{
                $smsg_list[$key]['flag'] = 0;
            }
        }
        //查询评论表
        foreach($smsg_list as $key=>$val){
            $data = $comment->relation('user1')->order('comm_ctime asc')->where("title_id=".$val['smsg_id'])->limit(5)->select();
            if($data){
                //查询点赞表
                foreach($data as $k=>$v){
                    $d = $up->where("user_id=$user_id and msg_id=".$v['comm_id']." and up_type=1")->select();
                    if($d){
                        $data[$k]['flag'] = 1;
                    }else{
                        $data[$k]['flag'] = 0;
                    }
                }
                $smsg_list[$key]['smsg_comment'] = $data;
            }else{
                $smsg_list[$key]['smsg_comment'] = "";
            }
        }
        return $smsg_list;
    }
    //添加短消息
    function smsgAddHandle(){
//        dump($_POST);
        $smsg = D('Smsg');
        $data = $smsg->create();
        $data['smsg_content'] = $_POST['content'];
//        dump($data);
//        die();
        if(!$data){
            echo $smsg->getError();
        }else{
            if($smsg->add($data)){
                //查询新增动态
                $tdata = $smsg->where('from_id='.$_SESSION['uinfo']['user_id'])->order('smsg_ctime desc')->find();
                //显示页面
                $this->assign('sdata',$tdata);
                $this->display();
                //写入系统消息
                $tid = $tdata['smsg_id'];
                if(!$this->sysSet($_SESSION['uinfo']['user_id'],$tid,2)){
//                    echo 'OK';
                }
            }else{
                echo 'ERROR';
            }
        }
    }
    //上传图片
    function upSmsgImage(){
        $config = array(
            'rootPath'=> './Upload/images/',
            'maxSize' => '10485760',
            'exts' => array('jpg','png','gif'),
        );
        //实例化文件上传类
        $upfile = new \Think\Upload($config);
        $info = $upfile->upload();
//        dump($info);
//        die();
        if(!$info){
            echo $upfile->getError();
        }else{
            $result = array();
            // 文件上传后的保存路径
            $result['url'] = $info['upfile']['savepath'].$info['upfile']['savename'];
            $result['state'] = 'SUCCESS';

            echo json_encode($result);
        }
    }
    //状态点赞
    function smsgUp(){
//        var_dump($_POST);
//        die();
        //判断是否赞过
        if($this->smsgUpCheck() == 1){
            return 0;
        }
        $up = D('Up');
        $data['msg_id'] = I('post.id');
        $data['up_type'] = intval(I('post.type'));
//        var_dump($data);
        $data['user_id'] = $_SESSION['uinfo']['user_id'];
//        echo "<br>";
        $up->add($data);
//        echo $up->getLastSql();
        //状态表点赞数加一
        if($data['up_type']==0){
            $smsg = D('Smsg');
            $smsg->where('smsg_id='.$data['msg_id'])->setInc('smsg_up',1);
            $tdata = $up->where('user_id='.$_SESSION['uinfo']['user_id'])->order('up_id desc')->find();
            $tid = $tdata['up_id'];
//        dump($tdata);
            if(!$this->sysSet($_SESSION['uinfo']['user_id'],$tid,4)){
//            echo 'OK';
            }else{
                echo "error";
            }
        }elseif($data['up_type']==1){
            $comment = D('Comment');
            $comment->where('comm_id='.$data['msg_id'])->setInc('comm_up',1);
        }elseif($data['up_type']==2){

        }
        //写入系统消息

    }

    //取消点赞
    function smsgUpDel(){
        $up = D('Up');
        $systerm = D('Systerm');
        $data['msg_id'] = I('post.id');
        $data['up_type'] = intval(I('post.type'));
        $upmsg = $up->where('msg_id=' . $data['msg_id'] . " and up_type=" . $data['up_type'])->find();
        $num = $up->delete($upmsg['up_id']);
        if($num == 0){
            return;
        }
        //状态表点赞数减一
        if ($data['up_type'] == 0) {
            $smsg = D('Smsg');
            $smsg->where('smsg_id=' . $data['msg_id'])->setDec('smsg_up', 1);
            //删除点赞的系统信息
            $systerm->where('sys_type=4 and state_id='.$upmsg['up_id'].' and from_uid='.$_SESSION['uinfo']['user_id'])->delete();
        } elseif ($data['up_type'] == 1) {
            $comment = D('Comment');
            $comment->where('comm_id=' . $data['msg_id'])->setDec('comm_up', 1);
        }
        echo 'OK';
    }
    //查询是否赞过
    function smsgUpCheck(){
//        var_dump($_POST);
//        die();
        $up = D('Up');
        $msg_id = I('post.id');
        $up_type = I('post.type');
        $user_id = $_SESSION['uinfo']['user_id'];
        $data = $up->where("msg_id=$msg_id and user_id=$user_id and up_type=$up_type")->find();
//        var_dump($data);
//        die();
//        $data = $up->where("msg_id=$msg_id and user_id=3")->find();
        if(!$data){
            return 0;
        }else{
            return 1;
        }
    }

    //关注
    function payAtten(){
        $atten_id = I('post.uid');
        //将获取到的id值写入关注人字符串
        $user_attention = $_SESSION['uinfo']['user_attention'];
        $user_attention .= ",".$atten_id;
        //将新组合的字符串写入数据库和session
        $user1 = D('User1');
        $user1->user_attention = $user_attention;
        if($user1->where("user_id=".$_SESSION['uinfo']['user_id'])->save()){
            //写入对方粉丝
            $user_fans = $user1->find($atten_id);
            $user_fans['user_fans'] .= ','.$_SESSION['uinfo']['user_id'];
            $user1->user_fans = $user_fans['user_fans'];
            $result = $user1->where("user_id=".$atten_id)->save();
            //写入系统消息
            $uid = $_SESSION['uinfo']['user_id'];
            $tid = $atten_id;
            $this->sysSet($uid,$tid,1);
            //关注人数+1,对方粉丝数+1
            $user1->where('user_id='.$_SESSION['uinfo']['user_id'])->setInc('user_cnum',1);
            $user1->where('user_id='.$atten_id)->setInc('user_fnum',1);
            $_SESSION['uinfo']['user_cnum']++;
            $_SESSION['uinfo']['user_attention'] = $user_attention;
            echo "OK";
        }
    }

    //取消关注
    function revAtten(){
        $atten_id = I('post.uid');
        $user1 = D('User1');
        $user_attention = $_SESSION['uinfo']['user_attention'];
        $user_fans = $user1->find($atten_id);
        $user_fans = $user_fans['user_fans'];
//        var_dump($user_fans);
//        die();
        $user_attention = $this->preg($atten_id,$user_attention);
        $user_fans = $this->preg($_SESSION['uinfo']['user_id'],$user_fans);
        //写入数据库并修改session里保存的数据
        $data['user_attention'] = $user_attention;
        if($user1->where("user_id=".$_SESSION['uinfo']['user_id'])->save($data)){
            //修改对方粉丝字段
            $data2['user_fans'] = $user_fans;
            $user1->where('user_id='.$atten_id)->save($data2);
            //删除系统消息
            $systerm = D('Systerm');
            $uid = $_SESSION['uinfo']['user_id'];
            $tid = $atten_id;
            $systerm->where('sys_type=1 and from_uid='.$uid.' and state_id='.$tid)->delete();
            //关注人数-1,对方粉丝数-1
            $user1->where('user_id='.$_SESSION['uinfo']['user_id'])->setDec('user_cnum',1);
            $user1->where('user_id='.$atten_id)->setDec('user_fnum',1);
            $_SESSION['uinfo']['user_cnum']--;
            $_SESSION['uinfo']['user_attention'] = $user_attention;
            echo "OK";
        }
    }

    //从字符串中截取掉某个id
    function preg($id,$str){
        //正则匹配
        $num = preg_match("/,".$id.",/",$str);
        if($num){
            //存在表示在中间，直接替换
            $user_attention = preg_replace("/,".$id.",/",',',$str);
        }else{
            //不在中间说明在结尾，截取掉
            $idlength = mb_strlen(",".$id,'UTF8');
            $atlength = mb_strlen($str,'UTF8');
            $length = $atlength - $idlength;
            $str = substr($str,0,$length);
        }
        return $str;
    }
    //粉丝页面
    function friend(){
        $user_id = I('get.id');
        $type = I('get.type');
        $field = 'user_'.$type;
        $user1 = D('User1');
        $data = $user1->field($field)->find($user_id);
//        var_dump($data);
//        $idlength = mb_strlen(",".$user_id,'UTF8');
//        $length = mb_strlen($data[$field],'UTF8');
//        $data[$field] = substr($data[$field],$idlength,$length);
        $friend = $user1->where('user_id in ('.$data[$field].')')
            ->field('user_id,user_nickname,user_addr,user_email,user_tel,user_header,user_intro')
            ->select();
//        dump($friend);

        $this->assign('friend',$friend);
        $this->display('friend');
    }

    //个人资料
    function userinfo(){
//        $user1 = D('User1');
//        $id = $_SESSION['uinfo']['user_id'];
//        $data = $user1->find($id);
//        dump($data);
        $this->display();
    }

    //修改个人资料
    function userModify(){
        $user1 = D('User1');
        $id = $_SESSION['uinfo']['user_id'];
        $data = $user1->create('',2);
//        dump($data);
//        die();
        if(!$data){
            echo $user1->getError();
            die();
        }
        if($user1->where('user_id='.$id)->save($data)){
            $this->sessionFlush($id);
            $this->success('修改成功','/User/index/userid/'.$id.'.html',3);
        }else{
            $this->error('修改失败',U('userinfo'),3);
        }
    }
    //上传头像
    function upImage(){
        if(!isset($_SESSION)){
            session_start();
        }
//        echo 'OK';
//        die();
        $config = array(
            'rootPath' => './Upload/',
            'maxSize' => 5242880,
            'exts' => array('jpg','png','gif'),
        );
        //实例化文件上传类
        $upload = new \Think\Upload($config);
        //调用uoload方法进行文件上传
        $info = $upload->upload();
//        $fp = fopen('f:/php/a.txt','w');
//        fwrite($fp,serialize($info));
        if(!$info){
            echo $upload->getError();
        }else{
//            dump($info);
            //制作缩略图
            $img = new \Think\Image();
            //打开要处理的图片
            $path = './Upload/'.$info['Filedata']['savepath'].$info['Filedata']['savename'];
            $img->open($path);
            //进行缩略操作
            $img->thumb(145,120);
            //保存缩略图
            $smallpath = './Upload/'.$info['Filedata']['savepath']."thumb_".$info['Filedata']['savename'];
            $img->save($smallpath);
            $result = array(
                'pic' => $path,
                'smallpic' => $smallpath,
            );
            echo json_encode($result);
        }
    }

}