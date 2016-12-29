<?php if (!defined('THINK_PATH')) exit();?><select onchange="city(this);" data-placeholder="请选择一个省份" class="chosen-select from-control" style="width:300px;height:30px;" tabindex="2" name="province">
	<option value="">请选择省份</option>
	<?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
<span id="city"></span>