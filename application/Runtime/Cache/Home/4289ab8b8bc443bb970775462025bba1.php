<?php if (!defined('THINK_PATH')) exit(); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['fromid'] == $_SESSION['uinfo']['user_id']): ?><div class="chat-message right">
		<img class="message-avatar" src="<?php echo ($_SESSION['uinfo']['user_header']); ?>" alt="">
		<div class="message">
			<a class="message-author" href="#"> <?php echo ($_SESSION['uinfo']['user_nickname']); ?>
			</a>
		<span class="message-date">
			<?php echo (date("Y-m-d - H:i:s",$vo["time"])); ?>
		</span>
		<span class="message-content">
			<?php echo ($vo["content"]); ?>
		</span>
		</div>
		</div>
	<?php else: ?>
		<div class="chat-message left">
		<img class="message-avatar" src="<?php echo ($user["user_header"]); ?>" alt="">
		<div class="message">
			<a class="message-author" href="#"> <?php echo ($user["user_nickname"]); ?>
			</a>
		<span class="message-date">
			<?php echo (date("Y-m-d - H:i:s",$vo["time"])); ?>
		</span>
		<span class="message-content">
			<?php echo ($vo["content"]); ?>
		</span>
		</div>
		</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>