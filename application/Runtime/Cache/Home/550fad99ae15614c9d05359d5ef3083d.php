<?php if (!defined('THINK_PATH')) exit();?><img class="message-avatar" src="<?php echo ($_SESSION['uinfo']['user_header']); ?>" alt="">
<div class="message">
	<a class="message-author" href="#"> <?php echo ($_SESSION['uinfo']['user_nickname']); ?> </a>
	<span class="message-date">
		<?php echo (date("Y-m-d - H:i:s",$arr["time"])); ?>
	</span>
	<span class="message-content">
		<?php echo ($arr["content"]); ?>
	</span>
</div>