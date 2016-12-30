<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 个人资料</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/Public/Common/favicon.ico"> <link href="/Public/Common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Common/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Common/css/animate.css" rel="stylesheet">
    <link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
		.point:hover{
			cursor:pointer;
		}
	</style>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人资料</h5>
                    </div>
                    <div>
                        <div class="ibox-content no-padding border-left-right">
                            <img alt="image" class="img-responsive" src="<?php echo ($uinfo["user_header"]); ?>" style="width:200px;margin:5px auto;">
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong><?php echo ($uinfo["user_nickname"]); ?></strong></h4>
							<?php if($uinfo[user_addr] == ''): ?><p><i class="fa fa-map-marker"></i>尚未填写</p>
							<?php else: ?>
								<p><i class="fa fa-map-marker"></i><?php echo ($uinfo["user_addr"]); ?></p><?php endif; ?>

                            <h5></h5>
                            <p><?php echo ($uinfo["user_intro"]); ?></p>
                            <div class="row m-t-lg">
                                <div class="col-sm-4">
                                    <h5 class="point" onclick="article(<?php echo ($uinfo["user_id"]); ?>)"><strong>169</strong> 文章</h5>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="point" onclick="attention(<?php echo ($uinfo["user_id"]); ?>)"><strong><?php echo ($uinfo["user_cnum"]); ?></strong> 关注</h5>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="point" onclick="fans(<?php echo ($uinfo["user_id"]); ?>)"><strong id="fnum"><?php echo ($uinfo["user_fnum"]); ?></strong> 关注者</h5>
                                </div>
                            </div>
                            <div class="user-button">
                                <div class="row">

									<?php if($uinfo["user_id"] == $_SESSION['uinfo']['user_id']): ?><div class="col-sm-6">
											<button type="button" class="btn btn-primary btn-sm btn-block userinfo"><i class="fa fa-envelope"></i> 个人资料</button>
										</div>
										<div class="col-sm-6">
											<button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> 设置</button>
										</div>
									<?php else: ?>
										<div class="col-sm-6">
										<button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> 发送消息</button>
										</div>
										<?php if($uinfo["aflag"] == 1): ?><div class="col-sm-6">
												<button type="button" id="atten" class="btn btn-default btn-sm btn-block on"><i class="fa fa-coffee"></i> 取消关注</button>
											</div>
										<?php else: ?>
											<div class="col-sm-6">
												<button type="button" id="atten" class="btn btn-primary btn-sm btn-block"><i class="fa fa-coffee"></i> 关注</button>
											</div><?php endif; endif; ?>
									<form action="" id="usermsg">
										<input type="hidden" name="uid" value="<?php echo ($uinfo["user_id"]); ?>">
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>最新动态</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="profile.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="profile.html#">选项1</a>
                                </li>
                                <li><a href="profile.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div>
                            <div class="feed-activity-list">
								<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["sys_type"] == 1): ?><div class="feed-element">
											<a href="profile.html#" class="pull-left">
												<img alt="image" class="img-circle" src="<?php echo ($uinfo["user_header"]); ?>">
											</a>
											<div class="media-body ">
												<small class="pull-right text-navy"><?php echo (date("H:m:s",$vo["sys_ctime"])); ?></small>
												<strong><?php echo ($uinfo["user_nickname"]); ?></strong> 关注了 <a href="<?php echo U('User/index',array('userid'=>$vo['state_id']));?>"><img alt="image" class="img-circle" src="<?php echo ($vo["ext"]["user_header"]); ?>"><strong><?php echo ($vo["ext"]["user_nickname"]); ?></strong></a>
												<br>
												<small class="text-muted"><?php echo (date("Y-m-d",$vo["sys_ctime"])); ?></small>
												<div class="actions">
													<a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 赞 </a>
													<a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> 收藏</a>
												</div>
											</div>
										</div><?php endif; ?>
									<?php if($vo["sys_type"] == 2): ?><div class="feed-element">
										<div class="social-feed-box">
											<small class="pull-right text-navy"><?php echo (date("H:m:s",$vo["sys_ctime"])); ?></small>
											<div class="social-avatar">
												<a href="" class="pull-left">
													<img alt="image" src="<?php echo ($uinfo["user_header"]); ?>">
												</a>
												<div class="media-body">
													<a href="<?php echo U('User/index',array('userid'=>$uinfo['user_id']));?>">
														<?php echo ($uinfo["user_nickname"]); ?>
													</a>
													<small class="text-muted"><?php echo (date("Y年m月d日  H:i:s",$vo["ext"]["smsg_ctime"])); ?></small>
												</div>
											</div>
											<div class="social-body">
												<p>
													<?php echo ($vo["ext"]["smsg_content"]); ?>
												</p>

												<div class="btn-group">
													<?php if($vo['ext']['flag'] == 0): ?><button value="<?php echo ($vo["ext"]["smsg_id"]); ?>" class="btn btn-default btn-xs up"><i class="fa fa-thumbs-up"></i><span id="up-<?php echo ($vo["ext"]["smsg_id"]); ?>"> <?php echo ($vo["ext"]["smsg_up"]); ?></span></button>
														<?php else: ?>
														<button value="<?php echo ($vo["ext"]["smsg_id"]); ?>" class="btn btn-success btn-xs up on"><i class="fa fa-thumbs-up"></i><span id="up-<?php echo ($vo["ext"]["smsg_id"]); ?>"> <?php echo ($vo["ext"]["smsg_up"]); ?></span></button><?php endif; ?>
													<button class="btn btn-white btn-xs commbox"><i class="fa fa-comments"></i> 评论</button>
													<button class="btn btn-white btn-xs"><i class="fa fa-share"></i> 分享</button>
												</div>
											</div>
											<div class="social-footer">
												<div class="social-com">
													<?php if(is_array($vo["ext"]["smsg_comment"])): $i = 0; $__LIST__ = $vo["ext"]["smsg_comment"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comm): $mod = ($i % 2 );++$i;?><div class="social-comment">
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

										</div>

									</div><?php endif; ?>
									<?php if($vo["sys_type"] == 4): ?><div class="feed-element">
											<a href="profile.html#" class="pull-left">
												<img alt="image" class="img-circle" src="<?php echo ($uinfo["user_header"]); ?>">
											</a>
											<div class="media-body ">
												<small class="pull-right text-navy"><?php echo (date("H:m:s",$vo["sys_ctime"])); ?></small>
												<strong><?php echo ($uinfo["user_nickname"]); ?></strong> 赞了
												<br>
												<small class="text-muted"><?php echo (date("Y-m-d",$vo["sys_ctime"])); ?></small>
											</div>
										</div>
										<div class="social-feed-box">
											<div class="social-avatar">
												<a href="" class="pull-left">
													<img alt="image" src="<?php echo ($vo["ext"]["user_header"]); ?>">
												</a>
												<div class="media-body">
													<a href="<?php echo U('User/index',array('userid'=>$vo['ext']['from_id']));?>">
														<?php echo ($vo["ext"]["user_nickname"]); ?>
													</a>
													<small class="text-muted"><?php echo (date("Y年m月d日  H:i:s",$vo["ext"]["smsg_ctime"])); ?></small>
												</div>
											</div>
											<div class="social-body">
												<p>
													<?php echo ($vo["ext"]["smsg_content"]); ?>
												</p>

												<div class="btn-group">
													<?php if($vo['ext']['flag'] == 0): ?><button value="<?php echo ($vo["ext"]["smsg_id"]); ?>" class="btn btn-default btn-xs up"><i class="fa fa-thumbs-up"></i><span id="up-<?php echo ($vo["ext"]["smsg_id"]); ?>"> <?php echo ($vo["ext"]["smsg_up"]); ?></span></button>
														<?php else: ?>
														<button value="<?php echo ($vo["ext"]["smsg_id"]); ?>" class="btn btn-success btn-xs up on"><i class="fa fa-thumbs-up"></i><span id="up-<?php echo ($vo["ext"]["smsg_id"]); ?>"> <?php echo ($vo["ext"]["smsg_up"]); ?></span></button><?php endif; ?>
													<button class="btn btn-white btn-xs commbox"><i class="fa fa-comments"></i> 评论</button>
													<button class="btn btn-white btn-xs"><i class="fa fa-share"></i> 分享</button>
												</div>
											</div>
											<div class="social-footer">
												<div class="social-com">
													<?php if(is_array($vo["ext"]["smsg_comment"])): $i = 0; $__LIST__ = $vo["ext"]["smsg_comment"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comm): $mod = ($i % 2 );++$i;?><div class="social-comment">
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

										</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </div>

                            <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> 显示更多</button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/Public/Common/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Common/js/bootstrap.min.js?v=3.3.6"></script>



    <!-- 自定义js -->
    <script src="/Public/Common/js/content.js?v=1.0.0"></script>


    <!-- Peity -->
    <script src="/Public/Common/js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity -->
    <script src="/Public/Common/js/demo/peity-demo.js"></script>

	<script>
		//关注或者取消关注
		$('#atten').click(function(){
			var button = $(this);
			//判断类里是否有on
			if(button.hasClass('on')){
				//取消关注
//				alert('OK');
				$.ajax({
					cache: true,
					type: "POST",
					url: '/User/revAtten',
					data: $('#usermsg').serialize(),// form
					async: false,
					error: function (request) {
						alert("Connection error");
					},
					success: function (data) {
						if(data == 'OK'){
							button.attr('class','btn btn-primary btn-sm btn-block');
							button.html('<i class="fa fa-coffee"></i> 关注</button>');
							var fnum = $('#fnum');
							var num = parseInt(fnum.html())-1;
							fnum.html(num);
						}
					}
				});
				return;
			}
			//进行关注
			$.ajax({
				cache: true,
				type: "POST",
				url: '/User/payAtten',
				data: $('#usermsg').serialize(),// form
				async: false,
				error: function (request) {
					alert("Connection error");
				},
				success: function (data) {
					if(data == 'OK'){
						button.attr('class','btn btn-default btn-sm btn-block on');
						button.html('<i class="fa fa-coffee"></i> 取消关注</button>');
						var fnum = $('#fnum');
						var num = parseInt(fnum.html())+1;
//						alert(num);
						fnum.html(num);
					}
				}
			});
		});

		function fans(id){
			location.href = "/Home/User/friend/id/"+id+"/type/fans";
		}

		function attention(id){
			location.href = "/Home/User/friend/id/"+id+"/type/attention";
		}

		$('.userinfo').click(function(){
			location.href = "/Home/User/userinfo";
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