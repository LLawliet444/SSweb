<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2017/1/5
 * Time: 10:36
 */

namespace Home\Controller;
use Think\Controller;

class SearchController extends Controller{
    private $cl;
    function _initialize(){
        Vendor('Sphinx.sphinxapi');
        $this->cl = new \SphinxClient();
        $this->cl->SetServer('127.0.0.1',9312); //连接sphinx服务
        $this->cl->SetConnectTimeout(3);//超时时间
        $this->cl->SetArrayResult(true);//以数组形式返回获得结果
        $this->cl->SetMatchMode(SPH_MATCH_ANY);//分词，收集分词任何部分检索结果
        $this->cl->setLimits(0,12);//限制获取记录条数
    }

    function search($index){
        $index_name = $index;
        $key = I('post.top-search');
        $res = $this->cl->Query($key,$index_name);
        //格式输出
        $id = array();
        if(isset($res['matches'])){
            foreach($res['matches'] as $val){
                $id[] = $val['id'];
            }
            $ids = implode(',',$id);
        }else{
            $ids = false;
        }
        $keywords = array();
        foreach($res['words'] as $key => $val){
            $keywords[] = $key;
        }
        $result = array();
        $result['ids'] = $ids;
        $result['keywords'] = $keywords;
        return $result;
    }

    function searchUser(){
        echo '<pre>';
        $res = $this->search('user');
        $ids = $res['ids'];
        $keywords = $res['keywords'];
        $user1 = D('User1');
        $data = NULL;
        if($ids){
            $data = $user1->where('user_id in ('.$ids.')')->select();
        }
//        var_dump($keywords);
        foreach($keywords as $val){
            foreach($data as $k => $v){
                $data[$k]['user_nickname'] = preg_replace('/'.$val.'/','<span class="red">'.$val.'</span>',$data[$k]['user_nickname']);
            }
        }
//        var_dump($data);
        $this->assign('user',$data);
        $this->searchSmsg();
        echo '</pre>';
        $this->display();
    }

    function searchSmsg(){
        $res = $this->search('smsg');
        $ids = $res['ids'];
        $keywords = $res['keywords'];
        $smsg = D('Smsg');
        $data = NULL;
        if($ids){
            $data = $smsg->relation('user1')->where('smsg_id in ('.$ids.')')->select();
        }
        foreach($keywords as $val){
            foreach($data as $k => $v){
                $data[$k]['smsg_content'] = preg_replace('/'.$val.'/','<span class="red">'.$val.'</span>',$data[$k]['smsg_content']);
            }
        }
//        print_r($data);
        $this->assign('smsg_list',$data);
    }
}