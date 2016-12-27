<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 社交</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/Public/Common/favicon.ico"> <link href="/Public/Common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Common/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/Common/css/animate.css" rel="stylesheet">
    <link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
	<!--插件-->
	<!-- <link href="/Public/Common/js/plugins/Ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="/Public/Common/js/plugins/Ueditor/third-party/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/Common/js/plugins/Ueditor/umeditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/Common/js/plugins/Ueditor/umeditor.min.js"></script>
	<script type="text/javascript" src="/Public/Common/js/plugins/Ueditor/lang/zh-cn/zh-cn.js"></script> -->
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">

            <div class="col-sm-12">
                <div class="ibox">
                    <div class="ibox-content text-center">
                    	<div class="social-comment">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="<?php echo ($_SESSION['uinfo']['user_header']); ?>" style="width:40px;margin:0 10px;">
                                    </a>
                                    <div class="media-body">
                                        <form action="smsgAddHandle" id="smsg" name="smsg" method="post">
                                            <textarea class="form-control" placeholder="发布动态" name="content"></textarea>
                                            <input type="submit" value="发布" style="float:left;">
                                            <input type="hidden" name="user" value="<?php echo ($_SESSION['uinfo']['user_id']); ?>">
                                        </form>
                                    </div>
                            </div>
                    </div>
                </div>
				<?php if(is_array($smsg_list)): $i = 0; $__LIST__ = $smsg_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="social-feed-box">

						<div class="pull-right social-action dropdown">
							<button data-toggle="dropdown" class="dropdown-toggle btn-white">
								<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu m-t-xs">
								<li><a href="#">设置</a></li>
							</ul>
						</div>
						<div class="social-avatar">
							<a href="" class="pull-left">
								<img alt="image" src="<?php echo ($vo["user_header"]); ?>">
							</a>
							<div class="media-body">
								<a href="/User/index/userid/<?php echo ($vo["user_id"]); ?>">
									<?php echo ($vo["user_nickname"]); ?>
								</a>
								<small class="text-muted"><?php echo (date("Y年m月d日  H:i:s",$vo["smsg_ctime"])); ?></small>
							</div>
						</div>
						<div class="social-body">
							<p>
								<?php echo ($vo["smsg_content"]); ?>
							</p>

							<div class="btn-group">
                                <?php if($vo["flag"] == 0): ?><button value="<?php echo ($vo["smsg_id"]); ?>" class="btn btn-default btn-xs up"><i class="fa fa-thumbs-up"></i><span id="up-<?php echo ($vo["smsg_id"]); ?>"> <?php echo ($vo["smsg_up"]); ?></span></button>
                                <?php else: ?>
                                <button value="<?php echo ($vo["smsg_id"]); ?>" class="btn btn-success btn-xs up on"><i class="fa fa-thumbs-up"></i><span id="up-<?php echo ($vo["smsg_id"]); ?>"> <?php echo ($vo["smsg_up"]); ?></span></button><?php endif; ?>
								<button class="btn btn-white btn-xs commbox"><i class="fa fa-comments"></i> 评论</button>
								<button class="btn btn-white btn-xs"><i class="fa fa-share"></i> 分享</button>
							</div>
						</div>
						<div class="social-footer">
                            <div class="social-com">
                                <?php if(is_array($vo["smsg_comment"])): $i = 0; $__LIST__ = $vo["smsg_comment"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comm): $mod = ($i % 2 );++$i;?><div class="social-comment">
                                        <a href="" class="pull-left">
                                            <img alt="image" src="<?php echo ($comm["user1"]["user_header"]); ?>">
                                        </a>
                                        <div class="media-body">
                                            <a href="/User/index/userid/<?php echo ($comm["user1"]["user_id"]); ?>">
                                                <?php echo ($comm["user1"]["user_nickname"]); ?>
                                            </a> <?php echo ($comm["comm_content"]); ?>
                                            <br/>
                                            <?php if($comm["flag"] == 0): ?><a class="small" id="commup"><i class="fa fa-thumbs-up"></i> <span class="upnum" id="<?php echo ($comm["comm_id"]); ?>"><?php echo ($comm["comm_up"]); ?></span></a>
                                            <?php else: ?>
                                                <a class="small on" id="commup"><i class="fa fa-thumbs-up"></i> <span class="upnum" id="<?php echo ($comm["comm_id"]); ?>"><?php echo ($comm["comm_up"]); ?></span></a><?php endif; ?>
                                             
                                            -<small class="text-muted"><?php echo (date('Y年m月d日',$comm["comm_ctime"])); ?></small>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>                                
                            </div>
    						<div class="social-comment setcomment" style="display:none;">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="<?php echo ($_SESSION['uinfo']['user_header']); ?>">
                                    </a>
                                    <div class="media-body">
                                        <form action="<?php echo U('Comment/addComment');?>" class="comment" name="form-comment-{vo.smsg_id}" method="post">
                                            <textarea class="form-control" placeholder="填写评论" name="content"></textarea>
                                            <input type="submit" value="评论">
                                            <input type="hidden" value="<?php echo ($vo["smsg_id"]); ?>" name="title">
                                        </form>

                                    </div>
                            </div>

						</div>

					</div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/Public/Common/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Common/js/bootstrap.min.js?v=3.3.6"></script>



    <!-- 自定义js -->
    <script src="/Public/Common/js/content.js?v=1.0.0"></script>
	<script>
		//发布动态
		$('#smsg').submit(function(){
			var form = $(this);
			$.ajax({
				cache: true,
				type: "POST",
				url:'/User/smsgAddHandle',
				data:form.serialize(),// form
				async: false,
				error: function(request) {
					alert("Connection error");
				},
				success: function(data) {
					if(data == 'ERROR' || data =='内容不能为空' ){
						alert(data);
					}else{
						var div = $('<div>');
						div.html(data);
						div.attr('class','social-feed-box');
//						alert(data);
						$('.ibox').after(div);
					}
				}
			});
			return false;
		})
		//显示收起评论框
		$('.commbox').click(function(){
			var p = $(this).parents('.social-body');
			var parent = p.siblings('.social-footer');
//			alert(parent.html());
			var commbox = parent.children('.setcomment');
//			alert(commbox.html());
			if($(this).hasClass('on')){
				$(this).attr('class','btn btn-white btn-xs commbox');
				commbox.css('display','none');
				return;
			}
			$(this).attr('class','btn btn-white btn-xs commbox on');
			commbox.css('display','block');
		});
		//点赞
		$('.up').click(function(){
			var id = $(this).val();
			var up = $(this);
//			alert(smsgid);
			//判断是否赞过
			if(up.hasClass('on')){
				//赞过则取消赞
				up.attr('class','btn btn-default btn-xs up');
				var up_num = '#up-'+id;
				var num = parseInt($(up_num).html())-1;
//			alert(num);
				$(up_num).html(' '+num);
				$.post("<?php echo U('smsgUpDel');?>",'id='+id+'&type='+0,function(msg){
//					alert(msg);
				});
				return;
			}
			//未赞过点赞
			up.attr('class','btn btn-success btn-xs up on');
			var up_num = '#up-'+id;
			var num = parseInt($(up_num).html())+1;
//			alert(num);
			$(up_num).html(' '+num);
			$.post("<?php echo U('smsgUp');?>",'id='+id+'&type='+0,function(msg){
//				alert(msg);
			});
		});
		//评论点赞
		$('#commup').click(function(){
			var commup = $(this);
//			alert(smsgid);
			//判断是否赞过
			if(commup.hasClass('on')){
				//取消点赞
				commup.attr('class','small');
				var up_num = commup.find('span.upnum');
				var num = parseInt(up_num.html())-1;
//			alert(num);
				up_num.html(num);
				var id = up_num.attr('id');
				$.post("<?php echo U('smsgUpDel');?>",'id='+id+'&type='+1);
				return;
			}
			//增加点赞
			commup.attr('class','small on');
			var up_num = commup.find('span.upnum');
			var num = parseInt(up_num.html())+1;
//			alert(num);
			up_num.html(num);
			var id = up_num.attr('id');
			$.post("<?php echo U('smsgUp');?>",'id='+id+'&type='+1);
		});
		//评论
		$('.comment').submit(function(){
			var form = $(this);
			$.ajax({
				cache: true,
				type: "POST",
				url:'/Comment/addComment',
				data:form.serialize(),// form
				async: false,
				error: function(request) {
					alert("Connection error");
				},
				success: function(data) {
					if(data == 'ERROR' || data=='评论不能为空' ){
						alert(data);
					}else{
						var par1 = form.parents('.social-comment');
						var par = par1.prev();
						var div = $('<div>');
						div.html(data);
						div.attr('class','social-comment');
						par.append(div);
//						alert(par.attr('class'));
//						alert(data);
					}
				}
			});
			return false;
		})
	</script>


    
    

</body>

</html>