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

                                <div class="feed-element">
                                    <a href="profile.html#" class="pull-left">
                                        <img alt="image" class="img-circle" src="/Public/Common/img/a1.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">1天前</small>
                                        <strong>奔波儿灞</strong> 关注了 <strong>灞波儿奔</strong>.
                                        <br>
                                        <small class="text-muted">54分钟前 来自 皮皮时光机</small>
                                        <div class="actions">
                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 赞 </a>
                                            <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> 收藏</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="feed-element">
                                    <a href="profile.html#" class="pull-left">
                                        <img alt="image" class="img-circle" src="/Public/Common/img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">5分钟前</small>
                                        <strong>作家崔成浩</strong> 发布了一篇文章
                                        <br>
                                        <small class="text-muted">今天 10:20 来自 iPhone 6 Plus</small>

                                    </div>
                                </div>

                                <div class="feed-element">
                                    <a href="profile.html#" class="pull-left">
                                        <img alt="image" class="img-circle" src="/Public/Common/img/a2.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">2小时前</small>
                                        <strong>作家崔成浩</strong> 抽奖中了20万
                                        <br>
                                        <small class="text-muted">今天 09:27 来自 Koryolink iPhone</small>
                                        <div class="well">
                                            抽奖，人民币2000元，从转发这个微博的粉丝中抽取一人。11月16日平台开奖。随手一转，万一中了呢？
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 赞 </a>
                                            <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> 收藏</a>
                                            <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> 评论</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-element">
                                    <a href="profile.html#" class="pull-left">
                                        <img alt="image" class="img-circle" src="/Public/Common/img/a3.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">2天前</small>
                                        <strong>天猫</strong> 上传了2张图片
                                        <br>
                                        <small class="text-muted">11月7日 11:56 来自 微博 weibo.com</small>
                                        <div class="photos">
                                            <a target="_blank" href="http://24.media.tumblr.com/20a9c501846f50c1271210639987000f/tumblr_n4vje69pJm1st5lhmo1_1280.jpg">
                                                <img alt="image" class="feed-photo" src="img/p1.jpg">
                                            </a>
                                            <a target="_blank" href="http://37.media.tumblr.com/9afe602b3e624aff6681b0b51f5a062b/tumblr_n4ef69szs71st5lhmo1_1280.jpg">
                                                <img alt="image" class="feed-photo" src="img/p3.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="feed-element">
                                    <a href="profile.html#" class="pull-left">
                                        <img alt="image" class="img-circle" src="/Public/Common/img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5小时前</small>
                                        <strong>在水一方Y</strong> 关注了 <strong>那二十年的单身</strong>.
                                        <br>
                                        <small class="text-muted">今天 10:39 来自 iPhone客户端</small>
                                        <div class="actions">
                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 赞 </a>
                                            <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> 收藏</a>
                                        </div>
                                    </div>
                                </div>

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
	</script>
</body>

</html>