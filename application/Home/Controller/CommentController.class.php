<?php
/**
 * Created by PhpStorm.
 * User: 张欣欣
 * Date: 2016/12/19
 * Time: 21:54
 */

namespace Home\Controller;


class CommentController extends CommonController{
    function addComment(){
        $comment = D('Comment');
        $data = $comment->create();
//        dump($data);
        if(!$data){
            echo $comment->getError();
        }else{
            if($comment->add($data)){
                $this->assign('data',$data);
                $this->display();
            }else{
                echo "ERROR";
            }
        }
    }
}