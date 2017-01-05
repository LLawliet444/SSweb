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
    <link href="/Public/Common/css/style.css?v=4.1.1" rel="stylesheet">
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
                                <div class="chat-discussion" id="chat-discussion">
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
			$('#chat-'+id+' .msgNum').remove();
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
			var div = document.getElementById('chat-discussion');
			div.scrollTop = div.scrollHeight;
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
				var div = document.getElementById('chat-discussion');
				div.scrollTop = div.scrollHeight;
			}
		})
		//获取即时通讯信息
		function getMsgIns(){
			var id = $('.hidden').val();
			if(id){
				$.ajax({
					cache: true,
					type: "POST",
					url:'/Chat/getMsgIns',
					data:{userid:id},
					async: false,
					error: function(request) {
						alert("Connection error");
					},
//				dataType:'json',
					success: function(data) {
						var msg = $('.chat-discussion').html()+data;
						$('.chat-discussion').html(msg);
					}
				});
				var div = document.getElementById('chat-discussion');
				div.scrollTop = div.scrollHeight;
			}
		}
		//获取消息条目
		function getMsgNum(){
			$.ajax({
				cache: true,
				type: "POST",
				url:'/Chat/getMsgNum',
				async: false,
				error: function(request) {
					alert("Connection error");
				},
				dataType:'json',
				success: function(data) {
//					alert(data);
					if(data.length != 0){
						$.each(data,function(i,item){
							$('#chat-'+i+' .msgNum').remove();
//							alert(item);
							var span = $('<span>');
							span.attr('class','label label-danger msgNum');
							span.css('float','right');
							span.html(item);
							var div = $('#chat-'+i).children('.chat-user-name');
							div.append(span);
//							'<span class="label label-warning">16</span>';
						})
					}
				}
			});
		}
		setInterval('getMsgIns()',3000);
		setInterval('getMsgNum()',3000);
	</script>
</body>

</html>