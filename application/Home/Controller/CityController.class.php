<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/29
 * Time: 20:53
 */

namespace Home\Controller;
use Think\Controller;

class CityController extends Controller{
    function province(){
        $doc = new \DomDocument('1.0','utf-8');
        $doc->validateOnParse = true;
        $doc->Load("Public/Common/xml/city.xml");
        $nodes = $doc->getElementsByTagName('province');
        $province = array();
        foreach ($nodes as $tmp) {
            $province[] = $tmp->getAttribute("id");
        }
        $this->assign('province',$province);
        $this->display();
    }
    function city(){
        $doc = new \DomDocument('1.0','utf-8');
        $doc->validateOnParse = true;
        $doc->Load('Public/Common/xml/city.xml');
        $province = $_GET['province'];
        //获取省份节点
        $nodes = $doc->getElementById($province);
        $childlist = $nodes->childNodes;
        $city = array();
        for ($i=1;$i<$childlist->length ;$i+=2) {
            $city[] = $childlist->item($i)->nodeValue;
        }
        $this->assign('city',$city);
        $this->display();
    }
}