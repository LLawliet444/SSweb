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
    <link href="/Public/Common/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Common/css/animate.css" rel="stylesheet">
    <link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/Public/Common/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/Public/Common/js/plugins/Uploadify/uploadify.css">
	<script src="/Public/Common/js/jquery.min.js?v=2.1.4"></script>
	<script>
		function province(){
			//创建请求对象
			$.get("/City/province?"+Math.random(),function(data){
				document.getElementById('province').innerHTML = data;
			});
		}
	</script>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人资料- <small>修改个人资料</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="<?php echo U('userModify');?>" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">用户名</label>

								<div class="col-sm-10">
									<p class="form-control-static"><?php echo ($_SESSION['uinfo']['user_name']); ?></p>
								</div>
							</div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">昵称</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo ($_SESSION['uinfo']['user_nickname']); ?>" name="nickname">
                                </div>
                            </div>
                            <div class="form-group">
								<label class="col-sm-2 control-label">头像</label>

								<div class="col-sm-2" id="showPic">
										<img alt="image" src="<?php echo ($_SESSION['uinfo']['user_smallheader']); ?>">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">修改头像</label>
								<div class="col-sm-10">
									<input type='hidden' id='thumb' name='thumb' />
								</div>
								<div style='float:left;'>
									<input type="file" id="file" name="f" multiple="true" />
									<!--<div id='showPic'></div>-->
								</div>
								<div style='clear:both;'></div>
								</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">性别</label>
								<div class="col-sm-10">
									<div class="radio radio-success  radio-inline">

										<input type="radio" id="nan" value="男" name="sex" <?php if($_SESSION['uinfo']['user_sex'] == 男): ?>checked<?php endif; ?> > <label for="nan">男</label>
									</div>
									<div class="radio radio-success  radio-inline">

										<input type="radio" id="nv" value="女" name="sex" <?php if($_SESSION['uinfo']['user_sex'] == 女): ?>checked<?php endif; ?>> <label for="nv">女</label>
									</div>
									<div class="radio radio-success radio-inline">

										<input type="radio" id="mi" value="保密" name="sex" <?php if($_SESSION['uinfo']['user_sex'] == 保密): ?>checked<?php endif; ?>> <label for="mi">保密</label>
									</div>
								</div>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">地址</label>
								<div class="col-sm-10" id="province">
									<script>
										province();
									</script>
								</div>
							</div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">个人介绍</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="intro" value="<?php echo ($_SESSION['uinfo']['user_intro']); ?>"> <span class="help-block m-b-none" >将会显示在您的主页上</span>
                                </div>
                            </div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">邮箱地址</label>

								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" disabled="" value="<?php echo ($_SESSION['uinfo']['user_email']); ?>" placeholder="未填写" class="form-control" name="email">
										<span class="input-group-btn">
											<?php if($_SESSION['uinfo']['user_check']== 0): ?><button type="button" class="btn btn-primary">未验证，点击验证
												</button>
											<?php else: ?>
												<button type="button" class="btn btn-success">已验证
												</button><?php endif; ?>

										</span>
									</div>
								</div>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">手机号</label>

								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" readonly value="<?php echo ($_SESSION['uinfo']['user_tel']); ?>" placeholder="未填写" class="form-control" id="tel" name="tel">
										<span class="input-group-btn">
											<?php if($_SESSION['uinfo']['user_telcheck']== 0): ?><button type="button" class="btn btn-default sign">填写
												</button><?php endif; ?>
											<?php if($_SESSION['uinfo']['user_telcheck']== 1): ?><button type="button" class="btn btn-primary">未验证，点击验证
												</button><?php endif; ?>
											<?php if($_SESSION['uinfo']['user_telcheck']== 2): ?><button type="button" class="btn btn-success">已验证
												</button><?php endif; ?>

										</span>
									</div>
									
								</div>
							</div>

							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label">生日：</label>
								<div class="col-sm-10">
									<input readonly class="form-control layer-date" id="hello" name="birth" value="<?php echo ($_SESSION['uinfo']['user_birth']); ?>">
									<label class="laydate-icon inline demoicon" onclick="laydate({elem: '#hello'});"></label>
								</div>
							</div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">保存内容</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
							<input id="pic" type="hidden" name="pic" value="" />
							<input id="smallpic" type="hidden" name="smallpic" value="" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 全局js -->

    <script src="/Public/Common/js/bootstrap.min.js?v=3.3.6"></script>

    <!-- 自定义js -->
    <script src="/Public/Common/js/content.js?v=1.0.0"></script>

    <!-- iCheck -->
    <script src="/Public/Common/js/plugins/iCheck/icheck.min.js"></script>
    <!-- layerDate plugin javascript -->
    <script src="/Public/Common/js/plugins/layer/laydate/laydate.js"></script>
	<!--uplodify-->
	<script src="/Public/Common/js/plugins/Uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

		//生日js
		laydate({
			elem: '#hello', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
			event: 'click' //响应事件。如果没有传入event，则按照默认的click
		});

		//填写手机号
		$('.sign').click(function(){
			document.querySelector('#tel').removeAttribute('readonly');
		});

		//省市联动
		function city(obj){
			var province = obj.value;
			//发送Ajax请求到服务器
			$.get("/City/city?"+Math.random(),{province:province},function(data){
				$("#city").html(data);
			});
		}
		//上传图片
		$(document).ready(function(){
			$('#file').uploadify({
				'swf' : '/Public/Common/js/plugins/uploadify/uploadify.swf',
				'uploader' : "<?php echo U('upImage');?>",
				'buttonText' : '选择文件',
				'formData':{'<?php echo session_name(); ?>':'<?php echo session_id(); ?>'},
				'onUploadSuccess' : function (file, data, response){
//			alert(data);
					// 将data字符串转为json数据
					data = JSON.parse(data);
					var pic = data.pic;
					var smallpic = data.smallpic;
					// 创建img对象    var img = document.createElement('img');
					var img = $('<img />');
					// 将最前面的. 截取掉
					smallpic = smallpic.substr(1);
					// 给img增加src属性   img.src = data
					img.attr({'src':smallpic});
					// 获取id=showPic的div对象
					var div = $('#showPic');
					// 将img标签增加到div中
					div.html(img);
					// 将pic和smallpic写入表单的隐藏域
					// 获取pic表单对象
					$('#pic').val(pic);
					$('#smallpic').val('.'+smallpic);
				}
			});
		});
    </script>

    
    

</body>

</html>