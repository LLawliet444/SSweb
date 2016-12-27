<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/19
 * Time: 21:55
 */

namespace Home\Model;
use Think\Model\RelationModel;

class CommentModel extends RelationModel{
    //主键
    protected $pk = 'comm_id';
    //主要字段
    protected $fields = array(
        'comm_id','comm_content','from_id','comm_ctime','comm_up','title_id','user_toid','user_type',
    );
    //关联关系
    protected $_link = array(
        'user1'=>array(
            'mapping_type'=>self::BELONGS_TO,
            'foreign_key'=>'from_id',
            'class_name'=>'User1',
            'mapping_fields'=>array('user_nickname','user_header','user_id'),
        ),
    );
    //字段映射
    protected $_map = array(
        'content'=>'comm_content',
        'title'=>'title_id',
    );
    //自动验证
    protected $_validate= array(
        array('comm_content','require','评论不能为空',1,'regex',3),
    );

    //自动完成
    protected $_auto = array(
        array('from_id','getUserId',3,'function'),
        array('comm_ctime','getTimeStamp',3,'function'),
        array('comm_up','0',1,'string'),
    );
}