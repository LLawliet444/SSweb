<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
</head>
<body>
<form action="smsgAddHandle" name="smsg" method="post">
	<textarea name="content" id="" cols="30" rows="10">

	</textarea>
	<input type="hidden" name="user" value="<?php echo ($_SESSION['uinfo']['user_id']); ?>">
	<input type="submit" value="提交">
</form>
</body>
</html>