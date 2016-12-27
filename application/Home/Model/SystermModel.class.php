<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/22
 * Time: 20:16
 */

namespace Home\Model;
use Think\Model;

class SystermModel extends Model{
    //主键
    protected $pk = 'sys_id';
    //主要字段
    protected $fields = array(
        'sys_id','from_uid','state_id','sys_type','sys_ctime'
    );
    //自动完成
    protected $_auto = array(
        array('sys_ctime','getTimeStamp',3,'function'),
    );
}