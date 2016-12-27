<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/20
 * Time: 17:18
 */

namespace Home\Controller;
use Think\Controller;

class TestController extends Controller
{
    function testMem(){
        $mem  = new \Memcache();
        $mem->connect('127.0.0.1',11211);
        $rs = $mem->set('name','sady',0,0);
        var_dump($rs);
        echo "<pre>";
        $data = $mem->get('name');
        var_dump($data);
    }
    function testS(){
        //设置缓存
        S(array(
            'type'=>'memcache',
            'host'=>'127.0.0.1',
            'port'=>'11211',
            ));
        dump(S('La','php'));
        dump(S('La'));

    }
}