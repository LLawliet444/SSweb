<?php if (!defined('THINK_PATH')) exit();?><div class="pull-right social-action dropdown">
	<button data-toggle="dropdown" class="dropdown-toggle btn-white">
		<i class="fa fa-angle-down"></i>
	</button>
	<ul class="dropdown-menu m-t-xs">
		<li><a href="#">设置</a></li>
	</ul>
</div>
<div class="social-avatar">
	<a href="" class="pull-left">
		<img alt="image" src="<?php echo ($_SESSION['uinfo']['user_header']); ?>">
	</a>

	<div class="media-body">
		<a href="/User/index/userid/<?php echo ($_SESSION['uinfo']['user_id']); ?>">
			<?php echo ($_SESSION['uinfo']['user_nickname']); ?>
		</a>
		<small class="text-muted"><?php echo (date("Y年m月d日 H:i:s",$sdata["smsg_ctime"])); ?></small>
	</div>
</div>
<div class="social-body">
	<p>
		<?php echo ($sdata["smsg_content"]); ?>
	</p>

	<div class="btn-group">
		<button value="<?php echo ($sdata["smsg_id"]); ?>" class="btn btn-default btn-xs up"><i class="fa fa-thumbs-up"></i>
			<span id="up-<?php echo ($sdata["smsg_id"]); ?>"> <?php echo ($sdata["smsg_up"]); ?></span>
		</button>
		<button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> 评论</button>
		<button class="btn btn-white btn-xs"><i class="fa fa-share"></i> 分享</button>
	</div>
</div>
<div class="social-footer">
	<div class="social-com">
	</div>
	<div class="social-comment">
		<a href="" class="pull-left">
			<img alt="image" src="<?php echo ($_SESSION['uinfo']['user_header']); ?>">
		</a>

		<div class="media-body">
			<form action="<?php echo U('Comment/addComment');?>" class="comment" name="form-comment-{sdata.smsg_id}"
				  method="post">
				<textarea class="form-control" placeholder="填写评论" name="content"></textarea>
				<input type="submit" value="评论">
				<input type="hidden" value="<?php echo ($sdata["smsg_id"]); ?>" name="title">
			</form>

		</div>
	</div>

</div>