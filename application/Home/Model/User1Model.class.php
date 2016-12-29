<?php

/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/17
 * Time: 21:16
 */
namespace Home\Model;
use Think\Model\RelationModel;

class User1Model extends RelationModel{
    //主键
    protected $pk = 'user_id';
    //主要字段
    protected $fields = array(
        'user_id','user_name','user_nickname','user_pwd','user_addr','user_sex','user_birth','user_intro','user_email','user_ctime','user_header','user_attention','user_tel','user_check','user_cnum','user_fnum','user_fans','user_telcheck','user_smallheader'
    );
    //关联关系
//    protected $_link = array(
//        'dept'=>array(
//            'mapping_type'=>self::BELONGS_TO,
//            'foreign_key'=>'user_dept',
//            'class_name'=>'Dept',
//            'mapping_fields'=>'dept_name',
//        ),
//    );
    //字段映射
    protected $_map = array(
        'username'=>'user_name',
        'pwd'=>'user_pwd',
        'email'=>'user_email',
        'nickname'=>'user_nickname',
        'sex'=>'user_sex',
//        'addr'=>'user_addr',
        'intro'=>'user_intro',
        'tel'=>'user_tel',
        'birth'=>'user_birth',
        'pic'=>'user_header',
        'smallpic'=>'user_smallheader',

    );
    //自动验证
    protected $_validate= array(
        array('user_name','username','用户名必须为6-16位数字字母下划线组合',1,'regex',1),
        array('user_pwd','password','密码必须为6-16位数字字母下划线组合',1,'regex',1),
        array('re-pwd','user_pwd','两次密码不一致',1,'confirm',1),
        array('user_nickname','require','昵称不能为空',1,'regex',2),
        array('user_sex','checkSex','性别格式错误',1,'function',2),
        array('user_birthday','checkBirthday','性别格式错误',1,'function',2),
        array('user_tel','tel','手机号格式不正确',1,'regex',2),
        array('user_email','email','邮箱格式不正确',1,'regex',1),
    );

    //自动完成
    protected $_auto = array(
//        'user_id','user_name','user_nickname','user_pwd','user_addr','user_sex','user_birth','user_intro','user_email','user_ctime','user_header','user_attention','user_tel','user_check',
        array('user_pwd','setMd5',1,'function'),
        array('user_ctime','setDate',1,'function'),
        array('user_nickname','user_name',1,'field'),
        array('user_sex','男',1,'string'),
        array('user_intro','这个人很懒，什么都没有留下',1,'string'),
        array('user_header','./Upload/Header/pic5.jpg',1,'string'),
        array('user_addr','getAddr',3,'function'),
        array('user_header','rmDot',3,'function'),
        array('user_smallheader','rmDot',3,'function'),
    );
    //登录验证
    function checkLogin($name,$pwd){
        if(empty($name) || empty($pwd)){
            return false;
        }
        $info = $this->where("user_name='$name'")->find();
        if(empty($info)){
            return false;
        }else{
            if($info['user_password']==md5($pwd)){
                session('uinfo',$info);
                return true;
            }else{
                return false;
            }
        }
    }
}