<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 聊天窗口</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/Public/Common/favicon.ico"> <link href="/Public/Common/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Common/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Common/css/plugins/jsTree/style.min.css" rel="stylesheet">
    <link href="/Public/Common/css/animate.css" rel="stylesheet">
    <link href="/Public/Common/css/style.css?v=4.1.0" rel="stylesheet">
	<style>
		.chat-user:hover{
			cursor:pointer;
		}

	</style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content  animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <!--<small class="pull-right text-muted">最新消息：2015-02-02 18:39:23</small> 聊天窗口-->
                    </div>


                    <div class="ibox-content">

                        <div class="row">

                            <div class="col-md-9 ">
                                <div class="chat-discussion">

                                    <div class="chat-message">
                                        <img class="message-avatar" src="/Public/Common/img/a1.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 颜文字君</a>
                                            <span class="message-date"> 2015-02-02 18:39:23 </span>
                                            <span class="message-content">
											H+ 是个好框架
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/Public/Common/img/a4.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 林依晨Ariel </a>
                                            <span class="message-date">  2015-02-02 11:12:36 </span>
                                            <span class="message-content">
											jQuery表单验证插件 - 让表单验证变得更容易
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/Public/Common/img/a2.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 谨斯里 </a>
                                            <span class="message-date">  2015-02-02 11:12:36 </span>
                                            <span class="message-content">
											验证日期格式(类似30/30/2008的格式,不验证日期准确性只验证格式
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/Public/Common/img/a5.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 林依晨Ariel </a>
                                            <span class="message-date">  2015-02-02 - 11:12:36 </span>
                                            <span class="message-content">
											还有约79842492229个Bug需要修复
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/Public/Common/img/a6.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 林依晨Ariel </a>
                                            <span class="message-date">  2015-02-02 11:12:36 </span>
                                            <span class="message-content">
											九部令人拍案叫绝的惊悚悬疑剧情佳作】如果你喜欢《迷雾》《致命ID》《电锯惊魂》《孤儿》《恐怖游轮》这些好片，那么接下来推荐的9部同类题材并同样出色的的电影，绝对不可错过哦~

                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="chat-users">
                                    <div class="users-list">
										<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="chat-user" id="chat-<?php echo ($vo["user_id"]); ?>">
												<a href="<?php echo U('User/index/',array('userid'=>$vo['user_id']));?>"> <img class="chat-avatar" src="<?php echo ($vo["user_smallheader"]); ?>" alt=""></a>
												<div class="chat-user-name">
													<a href="#"><?php echo ($vo["user_nickname"]); ?></a>
												</div>
											</div><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="chat-message-form">

                                    <div class="form-group">
										<form action="" id="setMsg">
											<textarea class="form-control message-input" name="message" placeholder="输入消息内容，按回车键发送"></textarea>
										</form>

                                    </div>

                                </div>
                            </div>
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

	<script>
		//拉取对话内容
		$('.chat-user').click(function(){
			var id = $(this).attr('id');
			id = id.split('-');
			id = id[1];
			$('.hidden').remove();
			var input = $('<input>');
			input.attr("value",id);
			input.attr("class",'hidden');
			input.attr("name",'userid');
			input.attr("type","hidden");
			$('#setMsg').append(input);
			$.ajax({
				cache: true,
				type: "POST",
				url:'/Chat/getMsg',
				data:{userid:id},
				async: false,
				error: function(request) {
					alert("Connection error");
				},
				success: function(data) {
//					alert(data);
//					return;
					$('.chat-discussion').html(data);
				}
			});
		})
		//提交消息
		$('#setMsg').keydown(function(e){
			var form = $('#setMsg')
			e = e||window.event;
			if(e.keyCode == 13){
				$.ajax({
					cache: true,
					type: "POST",
					url:'/Chat/setMsg',
					data:form.serialize(),// form
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						$("form")[0].reset();
						if(data != 'ERROR'){
							var div = $('<div>');
							div.attr('class','chat-message right');
							div.html(data);
							$('.chat-discussion').append(div);
						}
					}
				});
			}
		})

		function getMsg(){
			$id = $('.hidden').val();
		}

		function catchMsg(){

		}
	</script>
    
    
</body>

</html>