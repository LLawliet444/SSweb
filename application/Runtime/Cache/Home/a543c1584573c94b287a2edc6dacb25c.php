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

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
			<?php if(is_array($friend)): $i = 0; $__LIST__ = $friend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-4">
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
									<strong>sign:</strong><a href=""><?php echo ($vo["intro"]); ?></a><br>
									<strong title="Phone">Tel:</strong> <?php echo ($vo["user_tel"]); ?>
								</address>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
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
			location.href = "/Home/User/index/userid/"+id;
		})
    </script>

    
    

</body>

</html>