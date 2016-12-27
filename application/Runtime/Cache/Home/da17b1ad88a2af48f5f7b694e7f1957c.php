<?php if (!defined('THINK_PATH')) exit();?>	<a href="" class="pull-left">
		<img alt="image" src="<?php echo ($_SESSION['uinfo']['user_header']); ?>">
	</a>
	<div class="media-body">
		<a href="#">
			<?php echo ($_SESSION['uinfo']['user_nickname']); ?>
		</a> <?php echo ($data["comm_content"]); ?>
		<br/>
		<a href="#" class="small"><i class="fa fa-thumbs-up"></i> <?php echo ($data["comm_up"]); ?></a> -
		<small class="text-muted"><?php echo (date("Y年m月d日",$data["comm_ctime"])); ?></small>
	</div>