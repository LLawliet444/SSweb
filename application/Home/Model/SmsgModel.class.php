<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/18
 * Time: 21:20
 */

namespace Home\Model;
use Think\Model\RelationModel;

class SmsgModel extends RelationModel{
    //主键
    protected $pk = 'smsg_id';
    //主要字段
    protected $fields = array(
        'smsg_id','smsg_content','from_id','smsg_ctime','smsg_up'
    );
    //关联关系
    protected $_link = array(
        'user1'=>array(
            'mapping_type'=>self::BELONGS_TO,
            'foreign_key'=>'from_id',
            'class_name'=>'User1',
            'mapping_fields'=>array('user_name','user_header'),
        ),
    );
    //字段映射
    protected $_map = array(
//        'content'=>'smsg_content',
        'user'=>'from_id',
    );
    //自动验证
//    protected $_validate= array(
//        array('smsg_content','require','内容不能为空',1,'regex',3),
//    );

    //自动完成
    protected $_auto = array(
        array('smsg_ctime','getTimeStamp',3,'function'),
    );
}