<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/19
 * Time: 16:13
 */

namespace Home\Model;
use Think\Model;

class UpModel extends Model{
    //主键
    protected $pk = 'up_id';
    //主要字段
    protected $fields = array(
        'up_id','msg_id','user_id','up_type'
    );
}