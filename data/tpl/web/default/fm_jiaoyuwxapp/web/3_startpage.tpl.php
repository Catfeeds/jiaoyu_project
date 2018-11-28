<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'display') { ?>
<div class="main">	
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="weid" value="<?php  echo $weid;?>" />
		<div class="panel panel-default">
			<div class="panel-heading">启动页设置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">顶部标题</label>
					<div class="col-sm-2 col-lg-2">
						<div class="input-group">
							<input type="text" name="headtitle" class="form-control" value="<?php  echo $item['headtitle'];?>" required="开*吧*源*码*提*示：请输入标题名称" oninvalid="setCustomValidity('请输入标题名称')" title="请输入标题名称" oninput="setCustomValidity('')"/>
						</div>
						<span class="label label-success">如:xx教育</span>
					</div>
					<div class="col-sm-2 col-lg-2">
						<select name="headfont" class="form-control">
							<option value="#ffffff" <?php  if($item['headfont'] == '#ffffff') { ?> selected="selected"<?php  } ?>>白色</option>
							<option value="#000000" <?php  if($item['headfont'] == '#000000') { ?> selected="selected"<?php  } ?>>黑色</option>
						</select>	
						<span class="label label-success">顶部字体颜色</span>						
					</div>					
					<div class="col-sm-2 col-lg-2">
						<script type="text/javascript">
							$(function(){
								$(".colorpicker").each(function(){
									var elm = this;
									util.colorpicker(elm, function(color){
										$(elm).parent().prev().prev().val(color.toHexString());
										$(elm).parent().prev().css("background-color", color.toHexString());
									});
								});
								$(".colorclean").click(function(){
									$(this).parent().prev().prev().val("");
									$(this).parent().prev().css("background-color", "#FFF");
								});
							});
						</script>
						<div class="row row-fix">
							<div class="col-xs-8 col-sm-8" style="width: 300px;">
								<div class="input-group">
									<input class="form-control" type="text" name="headcolor" value="<?php  if($itme['headcolor']) { ?><?php  echo $item['headcolor'];?><?php  } else { ?>#06c1ae<?php  } ?>" required="请选择颜色" oninvalid="setCustomValidity('请选择颜色')" title="请选择颜色" oninput="setCustomValidity('')">
									<span class="input-group-addon" style="width:35px;border-left:none;background-color:<?php  if($item['headcolor']) { ?><?php  echo $item['headcolor'];?><?php  } else { ?>#06c1ae<?php  } ?>"></span>
									<span class="input-group-btn">
										<button class="btn btn-default colorpicker" type="button">选择颜色 <i class="fa fa-caret-down"></i></button>
										<button class="btn btn-default colorclean" type="button"><span><i class="fa fa-remove"></i></span></button>
									</span>
								</div>
							</div>
						</div>
						<span class="label label-success">全局顶部背景颜色</span>						
					</div>	
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">屏幕背景</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline">
							<input type="radio" value="1" class="printer-type" name="bgtype"<?php  if($item['bgtype'] == '1'  || empty($item)) { ?>checked<?php  } ?> id="credit1"> 纯色
						</label>
						<label class="radio-inline">
							<input type="radio" value="2" class="printer-type" name="bgtype" <?php  if($item['bgtype'] == '2') { ?>checked<?php  } ?> id="credit2"> 图片
							<!-- <span class="label label-success">推荐</span> -->
						</label>						
					</div>
				</div>	
				<div id="credit-status0" <?php  if($item['bgtype'] == 1 || empty($item)) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>	
					<div class="form-group system-icon">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">背景颜色</label>
						<div class="col-sm-9 col-xs-12">
							<?php  echo tpl_form_field_color('loginbgcolor', $item['loginbgcolor']);?>
							<span class="help-block">背景颜色</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">LOGO设置</label>
						<div class="col-sm-2 col-lg-2">
							<div class="input-group">
								<input type="text" name="imgname" class="form-control" value="<?php  echo $item['imgname'];?>"/>
							</div>
							<span class="help-block">如:XX教育</span>
						</div>	
						<div class="col-sm-2 col-lg-2">
							<script type="text/javascript">
								$(function(){
									$(".colorpicker").each(function(){
										var elm = this;
										util.colorpicker(elm, function(color){
											$(elm).parent().prev().prev().val(color.toHexString());
											$(elm).parent().prev().css("background-color", color.toHexString());
										});
									});
									$(".colorclean").click(function(){
										$(this).parent().prev().prev().val("");
										$(this).parent().prev().css("background-color", "#FFF");
									});
								});
							</script>
							<div class="row row-fix">
								<div class="col-xs-8 col-sm-8" style="width: 300px;">
									<div class="input-group">
										<input class="form-control" type="text" name="imgfontcolor" value="<?php  if($item['imgfontcolor']) { ?><?php  echo $item['imgfontcolor'];?><?php  } else { ?>#ffffff<?php  } ?>" >
										<span class="input-group-addon" style="width:35px;border-left:none;background-color:<?php  if($item['imgfontcolor']) { ?><?php  echo $item['imgfontcolor'];?><?php  } else { ?>#ffffff<?php  } ?>"></span>
										<span class="input-group-btn">
											<button class="btn btn-default colorpicker" type="button">选择颜色 <i class="fa fa-caret-down"></i></button>
											<button class="btn btn-default colorclean" type="button"><span><i class="fa fa-remove"></i></span></button>
										</span>
									</div>
								</div>
							</div>
							<span class="label label-success">字体颜色</span>
						</div>						
						<div class="col-sm-2 col-lg-2" style="width: 300px;margin-left:80px;">
							<script type="text/javascript">
								function showImageDialog(elm, opts, options) {
									require(["util"], function(util){
										var btn = $(elm);
										var ipt = btn.parent().prev();
										var val = ipt.val();
										var img = ipt.parent().next().children();
										options = {'global':false,'class_extra':'','direct':true,'multiple':false};
										util.image(val, function(url){
											if(url.url){
												if(img.length > 0){
													img.get(0).src = url.url;
												}
												ipt.val(url.attachment);
												ipt.attr("filename",url.filename);
												ipt.attr("url",url.url);
											}
											if(url.media_id){
												if(img.length > 0){
													img.get(0).src = "";
												}
												ipt.val(url.media_id);
											}
										}, null, options);
									});
								}
								function deleteImage(elm){
									require(["jquery"], function($){
										$(elm).prev().attr("src", "./resource/images/nopic.jpg");
										$(elm).parent().prev().find("input").val("");
									});
								}
							</script>
							<div class="input-group ">
								<input type="text" name="loginimg" value="<?php  echo tomedia($item['loginimg'])?>" class="form-control" autocomplete="off">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button" onclick="showImageDialog(this);">选择图片</button>
								</span>
							</div>
							<div class="input-group " style="margin-top:.5em;">
								<img src="<?php  echo tomedia($item['loginimg'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" width="40">建议尺寸为50*50的图片	
								<em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
							</div>						
						</div>	
					</div>					
				</div>
				<div id="credit-status1" <?php  if($item['bgtype'] == 2) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>	
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图片</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image('loginbgimg', $item['loginbgimg'])?>
							<span class="help-block">推荐尺寸640*1072</span>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">进入按钮</label>
					<div class="col-sm-2 col-lg-2">
						<div class="input-group">
							<input type="text" name="btnname" class="form-control" value="<?php  echo $item['btnname'];?>" required="输入按钮名称" oninvalid="setCustomValidity('输入按钮名称')" title="输入按钮名称" oninput="setCustomValidity('')"/>
						</div>
						<span class="help-block">如:进入校园</span>
					</div>	
					<div class="col-sm-2 col-lg-2">
						<script type="text/javascript">
							$(function(){
								$(".colorpicker").each(function(){
									var elm = this;
									util.colorpicker(elm, function(color){
										$(elm).parent().prev().prev().val(color.toHexString());
										$(elm).parent().prev().css("background-color", color.toHexString());
									});
								});
								$(".colorclean").click(function(){
									$(this).parent().prev().prev().val("");
									$(this).parent().prev().css("background-color", "#FFF");
								});
							});
						</script>
						<div class="row row-fix">
							<div class="col-xs-8 col-sm-8" style="width: 300px;">
								<div class="input-group">
									<input class="form-control" type="text" name="btnfontcolor" value="<?php  if($item['btnfontcolor']) { ?><?php  echo $item['btnfontcolor'];?><?php  } else { ?>#ffffff<?php  } ?>" required="请选择颜色" oninvalid="setCustomValidity('请选择颜色')" title="请选择颜色" oninput="setCustomValidity('')">
									<span class="input-group-addon" style="width:35px;border-left:none;background-color:<?php  if($item['btnfontcolor']) { ?><?php  echo $item['btnfontcolor'];?><?php  } else { ?>#ffffff<?php  } ?>"></span>
									<span class="input-group-btn">
										<button class="btn btn-default colorpicker" type="button">选择颜色 <i class="fa fa-caret-down"></i></button>
										<button class="btn btn-default colorclean" type="button"><span><i class="fa fa-remove"></i></span></button>
									</span>
								</div>
							</div>
						</div>
						<span class="label label-success">字体颜色</span>
					</div>
					<div class="col-sm-2 col-lg-2" style="margin-left:80px;">
						<script type="text/javascript">
							$(function(){
								$(".colorpicker").each(function(){
									var elm = this;
									util.colorpicker(elm, function(color){
										$(elm).parent().prev().prev().val(color.toHexString());
										$(elm).parent().prev().css("background-color", color.toHexString());
									});
								});
								$(".colorclean").click(function(){
									$(this).parent().prev().prev().val("");
									$(this).parent().prev().css("background-color", "#FFF");
								});
							});
						</script>
						<div class="row row-fix">
							<div class="col-xs-8 col-sm-8" style="width: 300px;">
								<div class="input-group">
									<input class="form-control" type="text" name="btncolor" value="<?php  if($item['btncolor']) { ?><?php  echo $item['btncolor'];?><?php  } else { ?>#ffffff<?php  } ?>" required="请选择颜色" oninvalid="setCustomValidity('请选择颜色')" title="请选择颜色" oninput="setCustomValidity('')">
									<span class="input-group-addon" style="width:35px;border-left:none;background-color:<?php  if($item['btncolor']) { ?><?php  echo $item['btncolor'];?><?php  } else { ?>#ffffff<?php  } ?>"></span>
									<span class="input-group-btn">
										<button class="btn btn-default colorpicker" type="button">选择颜色 <i class="fa fa-caret-down"></i></button>
										<button class="btn btn-default colorclean" type="button"><span><i class="fa fa-remove"></i></span></button>
									</span>
								</div>
							</div>
						</div>
						<span class="label label-success">边框颜色</span>
					</div>					
				</div>	
				<div class="form-group">
					<label class="col-sm-2 control-label">底部版权</label>
					<div class="col-sm-2 col-lg-2">
						<div class="input-group">
							<input type="text" name="copyright" class="form-control" value="<?php  echo $item['copyright'];?>" required="输入版权" oninvalid="setCustomValidity('输入版权')" title="输入版权" oninput="setCustomValidity('')"/>
						</div>
						<span class="help-block">如:@XX科技</span>
					</div>	
					<div class="col-sm-2 col-lg-2">
						<script type="text/javascript">
							$(function(){
								$(".colorpicker").each(function(){
									var elm = this;
									util.colorpicker(elm, function(color){
										$(elm).parent().prev().prev().val(color.toHexString());
										$(elm).parent().prev().css("background-color", color.toHexString());
									});
								});
								$(".colorclean").click(function(){
									$(this).parent().prev().prev().val("");
									$(this).parent().prev().css("background-color", "#FFF");
								});
							});
						</script>
						<div class="row row-fix">
							<div class="col-xs-8 col-sm-8" style="width: 300px;">
								<div class="input-group">
									<input class="form-control" type="text" name="copyrightfontcolor" value="<?php  if($item['copyrightfontcolor']) { ?><?php  echo $item['copyrightfontcolor'];?><?php  } else { ?>#ffffff<?php  } ?>" >
									<span class="input-group-addon" style="width:35px;border-left:none;background-color:<?php  if($item['copyrightfontcolor']) { ?><?php  echo $item['copyrightfontcolor'];?><?php  } else { ?>#ffffff<?php  } ?>"></span>
									<span class="input-group-btn">
										<button class="btn btn-default colorpicker" type="button">选择颜色 <i class="fa fa-caret-down"></i></button>
										<button class="btn btn-default colorclean" type="button"><span><i class="fa fa-remove"></i></span></button>
									</span>
								</div>
							</div>
						</div>
						<span class="label label-success">字体颜色</span>
					</div>					
				</div>				
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>	
</div>
<script>
$(function(){
	$('#credit1').click(function(){
		$('#credit-status0').show();
		$('#credit-status1').hide();
	});
	$('#credit2').click(function(){
		$('#credit-status0').hide();
		$('#credit-status1').show();
	});		
});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>