<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<title> - 联系人</title>
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="shortcut icon" href="/Public/Common/favicon.ico"> <link href="/Public/Common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
	<link href="/Public/Common/css/font-awesome.css?v=4.4.0" rel="stylesheet">

	<link href="/Public/Common/css/animate.css" rel="stylesheet">
	<link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
		.red{
			color:red;
		}
	</style>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
	<!--用户-->
	<div class="row">
		<?php if($user == NULL): ?><h1>未搜索到相关用户</h1><?php endif; ?>
		<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-4">
				<div class="contact-box">
					<a>
						<div class="col-sm-4">
							<div class="text-center">
								<img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo ($vo["user_header"]); ?>">
							</div>
						</div>
						<div class="col-sm-8 user" id="<?php echo ($vo["user_id"]); ?>">
							<h3><strong><?php echo ($vo["user_nickname"]); ?></strong></h3>
							<?php if(empty($vo['user_addr'])): ?><p><i class="fa fa-map-marker"></i><strong> 未知</strong> </p>
								<?php else: ?>
								<p><i class="fa fa-map-marker"></i><strong> <?php echo ($vo["user_addr"]); ?></strong> </p><?php endif; ?>

							<address>
								<strong>Email:</strong><?php echo ($vo["user_email"]); ?><br>
								<strong>sign:</strong><a href=""><?php echo ($vo["user_intro"]); ?></a><br>
								<strong title="Phone">Tel:</strong> <?php echo ($vo["user_tel"]); ?>
							</address>
						</div>
						<div class="clearfix"></div>
					</a>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<!--用户结束-->
	<!--动态-->
	<div class="row">

		<div class="col-sm-12">
			<?php if($smsg_list == NULL): ?><h1>未搜索到相关状态</h1><?php endif; ?>
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
							<img alt="image" src="<?php echo ($vo["user1"]["user_header"]); ?>">
						</a>
						<div class="media-body">
							<a href="/User/index/userid/<?php echo ($vo["from_id"]); ?>">
								<?php echo ($vo["user1"]["user_nickname"]); ?>
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
							<button class="btn btn-white btn-xs"><i class="fa fa-share"></i> 转发</button>
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
	<!--动态结束-->

</div>

<!-- 全局js -->
<script src="/Public/Common/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Common/js/bootstrap.min.js?v=3.3.6"></script>



<!-- 自定义js -->
<script src="/Public/Common/js/content.js?v=1.0.0"></script>



<script>
	$(document).ready(function () {
		$('.contact-box').each(function () {
			animationHover(this, 'pulse');
		});
	});
	//单击进入页面
	$('.user').click(function(){
		var id= $(this).attr('id');
		location.href = "http://www.project.com/User/index/userid/"+id;
	})
</script>




</body>

</html>