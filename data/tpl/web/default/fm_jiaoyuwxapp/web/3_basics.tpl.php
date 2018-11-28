<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'display') { ?>
<div class="main">	
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="weid" value="<?php  echo $weid;?>" />
		<div class="panel panel-default">
			<div class="panel-heading">基础设置</div>
			<div class="panel-body">
				<?php  if($version == 1 ) { ?>
					
				<div class="form-group" >
					<label class="col-sm-2 control-label">是否启用列表</label>
					<div class="col-sm-2 col-lg-2" style="width:200px">	
						<label class="radio-inline"><input type="radio" id="credit1" name="show_list" value="1" <?php  if($item['show_list'] == 1 || empty($item)) { ?> checked="checked" <?php  } ?> >不启用</input></label>
						<label class="radio-inline"><input type="radio" id="credit2" name="show_list" value="2" <?php  if($item['show_list'] == 2) { ?> checked ="echeked" <?php  } ?> >启用</input>	</label>			
					</div>		
				</div>
				<div class="form-group" id="link_school" <?php  if(empty($item) || $item['show_list'] == 1) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
					<label class="col-sm-2 control-label">关联学校</label>
					<div class="col-sm-2 col-lg-2" style="width:200px">
						<select name="fromweid" id="fromid" class="form-control">
							<option value="">请选择公众号</option>
							<?php  if(is_array($fromid)) { foreach($fromid as $row) { ?>
							<option value="<?php  echo $row['uniacid'];?>" <?php  if($item['fromweid']==$row['uniacid']) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
							<?php  } } ?>
						</select>	
						<span class="label label-success">选择归属公众号</span>						
					</div>
					<div class="col-sm-2 col-lg-2">
						<select name="schoolid" id="schoolidlist" class="form-control">
							<option value="">请选择公众号</option>
							<option value="<?php  echo $item['schoolid'];?>" <?php  if($item['schoolid']) { ?>selected<?php  } ?>><?php  echo $school['title'];?></option>					
						</select>	
						<span class="label label-success">选择学校</span>						
					</div>					
				</div>	
				<div class="form-group" id="link_wx" <?php  if($item['show_list'] == 2) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
					<label class="col-sm-2 control-label">关联公众号</label>
					<div class="col-sm-2 col-lg-2" style="width:200px">
						<select name="fromweid" id="fromid" class="form-control">
							<option value="">请选择公众号</option>
							<?php  if(is_array($fromid)) { foreach($fromid as $row) { ?>
							<option value="<?php  echo $row['uniacid'];?>" <?php  if($item['fromweid']==$row['uniacid']) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
							<?php  } } ?>
						</select>	
						<span class="label label-success">选择归属公众号</span>						
					</div>					
				</div>				
				<?php  } else { ?>
					<div class="form-group">
						<label class="col-sm-2 control-label">关联学校</label>
						<div class="col-sm-2 col-lg-2" style="width:200px">
							<select name="fromweid" id="fromid" class="form-control">
								<option value="">请选择公众号</option>
								<?php  if(is_array($fromid)) { foreach($fromid as $row) { ?>
								<option value="<?php  echo $row['uniacid'];?>" <?php  if($item['fromweid']==$row['uniacid']) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
								<?php  } } ?>
							</select>	
							<span class="label label-success">选择归属公众号</span>						
						</div>
						<div class="col-sm-2 col-lg-2">
							<select name="schoolid" id="schoolidlist" class="form-control">
								<option value="">请选择公众号</option>
								<option value="<?php  echo $item['schoolid'];?>" <?php  if($item['schoolid']) { ?>selected<?php  } ?>><?php  echo $school['title'];?></option>					
							</select>	
							<span class="label label-success">选择学校</span>						
						</div>					
					</div>				
				<?php  } ?>
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
		$('#link_school').show();
		$('#link_wx').hide();
	});
	$('#credit2').click(function(){
		$('#link_school').hide();
		$('#link_wx').show();
	});		
});
var fromid = $('#fromid').val();
$(document).ready(function() {
	$("#fromid").change(function() {
		var type = 2;
		var gradeId = $("#fromid option:selected").attr('value');
		changeGrade(gradeId,type, function() {
		});	
		
	});
	$("#bjid").change(function() {
		changeBj();
	});
	$("#sex").change(function() {
		changeSex();
	});
	
});
function changeGrade(gradeId, type, __result) {
	
	//$('#njidid').val(gradeId);
	
	var schoolid = "<?php  echo $schoolid;?>";
	var classlevel = [];
	//获取班次
	$.post("<?php  echo $this->createWebUrl('indexajax',array('op'=>'getschool'))?>", {'weid': gradeId}, function(data) {
		data = JSON.parse(data);
		classlevel = data.schoolist;
		
		var html = '';
		html += '<select id="schoolid"><option value="">请选择学校</option>';
		if (classlevel != '') {
			for (var i in classlevel) {
				html += '<option value="' + classlevel[i].id + '">' + classlevel[i].title + '</option>';
			}
		}
		$('#schoolidlist').html(html);
	});

}
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>