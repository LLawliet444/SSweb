<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/Public/Common/favicon.ico"> <link href="/Public/Common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Common/css/font-awesome.css?v=4.4.0" rel="stylesheet">
	<link href="/Public/Common/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Common/css/animate.css" rel="stylesheet">
    <link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
		.point:hover{
			cursor:pointer;
		}
	</style>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">S+</h1>

            </div>
            <h3>欢迎使用 SS</h3>

            <form class="m-t" role="form" action="<?php echo U('loginHandle');?>" method="post" >
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="用户名/手机号/邮箱" required="">
					<span id="check-user"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pwd" placeholder="密码" required="">
                </div>
				<div class="form-group text-left">
					<label class="point">
					<input type="checkbox" name="save" value="save" ><i></i> 登录保存一周</label>
				</div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>


                <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="<?php echo U('register');?>">注册一个新账号</a>
                </p>

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/Public/Common/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Common/js/bootstrap.min.js?v=3.3.6"></script>
	<script src="/Public/Common/js/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function(){
			$('#username').blur(function(){
				var username = $(this).val();
				var check = $('#check-user');
				check.html('loading...');
				check.css('color','gray');
				$.post("<?php echo U('checkLogUser');?>",'username='+username,function(msg){
					check.html(msg);
					check.css('color','red');
				});
			})
		})
	</script>
</body>

</html>