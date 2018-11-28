<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'display') { ?>
<script>
require(['bootstrap'],function($){
	$('.btn,.tips').hover(function(){
		$(this).tooltip('show');
	},function(){
		$(this).tooltip('hide');
	});
});
</script>
<div class="main">
    <style>
        .form-control-excel {
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }
    </style>
    <div class="panel panel-info">
        <div class="panel-heading">课程报名列表<?php  if(!empty($kecheng['name'])) { ?><span style="color:red;font-size:20px;font-weight:bold;">---<?php  echo $kecheng['name'];?></span><?php  } ?></div>
        <div class="panel ">
   			<div class="panel-heading">
	   			<a class="btn btn-primary" onclick="javascript :history.back(-1);"><i class="fa fa-tasks"></i> 返回课程列表</a>
   			</div>
		</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site">
				<input type="hidden" name="a" value="entry">
				<input type="hidden" name="m" value="fm_jiaoyu">
				<input type="hidden" name="do" value="baoming"/>
				<input type="hidden" name="op" value="display"/>
				<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
				<input type="hidden" name="is_pay" value="<?php  echo $_GPC['is_pay'];?>"/>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-1 control-label">支付状态</label>
					<div class="col-sm-9 col-xs-9 col-md-9">
						<div class="btn-group">
							<a href="<?php  echo $this->createWebUrl('baoming', array('id' => $item['id'], 'is_pay' => '-1', 'schoolid' => $schoolid))?>" class="btn <?php  if($is_pay == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
							<a href="<?php  echo $this->createWebUrl('baoming', array('id' => $item['id'], 'is_pay' => '1', 'schoolid' => $schoolid))?>" class="btn <?php  if($is_pay == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">未支付</a>
							<a href="<?php  echo $this->createWebUrl('baoming', array('id' => $item['id'], 'is_pay' => '2', 'schoolid' => $schoolid))?>" class="btn <?php  if($is_pay == 2) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">已支付</a>
							<a href="<?php  echo $this->createWebUrl('baoming', array('id' => $item['id'], 'is_pay' => '3', 'schoolid' => $schoolid))?>" class="btn <?php  if($is_pay == 3) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">已退费</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					 <label class="col-xs-12 col-sm-3 col-md-1 control-label">课程名称</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="kcname" id="" type="text" value="<?php  echo $_GPC['kcname'];?>">
                    </div>
					</div>
				<div class="form-group clearfix">
					<label class="col-xs-12 col-sm-3 col-md-1 control-label">下单时间</label>
					<div class="col-sm-7 col-lg-8 col-md-8 col-xs-12">
						<?php  echo tpl_form_field_daterange('createtime', array('start' => date('Y-m-d', $starttime), 'end' => date('Y-m-d', $endtime)));?>
					</div>
					
					<div class="col-xs-12 col-sm-2 col-md-1 col-lg-1">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>		
    </div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
                    <th class='with-checkbox' style="width: 3%;"><input type="checkbox" class="check_all" /></th>
					<th style="width:5%">订单号 </th>
					<th style="width:15%">课程</th>
					<th style="width:10%;">学生</th>
					<th style="width:10%;">报名人</th>
                    <th style="width:8%;">手机</th>
					<th style="width:15%;">付费时间</th>
					<th style="width:8%;">剩余课时</th>
					<?php  if($school['issale'] == 1 || $school['issale'] == 2) { ?>
                    <th style="width:8%;">金额</th>
					<th style="width:8%;">支付状态</th>
                    <?php  } ?>
					<th class="qx_933" style="text-align:right; width:8%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
                    <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
					<td>
                       <?php  echo $item['orderid'];?>
                    </td>
					<td><?php  echo $item['kcnanme'];?></td>	
					<td><span class="label label-danger"><?php  echo $item['s_name'];?></span></td>
					<td>  <?php  $userinfo = iunserializer($item['userinfo']);?>
                        <span class="label label-success"><?php  if(!empty($userinfo)) { ?><?php  if($item['pard'] ==2) { ?>母亲:<?php  } ?><?php  if($item['pard'] ==3) { ?>父亲:<?php  } ?><?php  if($item['pard'] ==4) { ?>本人:<?php  } ?><?php  echo $userinfo['name'];?><?php  } else { ?>未填写<?php  } ?></span>
                    </td>
					<td>
                        <?php  if(!empty($userinfo)) { ?><?php  echo $userinfo['mobile'];?><?php  } else { ?>未填写<?php  } ?>
                    </td>
                    <td>
                        <?php  if(!empty($item['paytime'])) { ?><?php  echo date('Y年m月d日 h:i:sa',$item['paytime'])?><?php  } else { ?><?php  } ?>
                    </td>
                     <td>
                        <?php  if(!empty($item['buycourse'])) { ?> <span class="label label-info"><?php  echo $item['restnum'];?>课时</span><?php  } else { ?>无<?php  } ?>
                    </td>
					<?php  if($school['issale'] == 1 || $school['issale'] == 2) { ?>
                    <td>
                       ￥<?php  echo $item['cose'];?>
                    </td>
                    <td>
                       <?php  if($item['status'] == 1) { ?><span class="label label-warning">未支付</span><?php  } else if($item['status'] == 2) { ?><span class="label label-success"><i class="fa fa-check-circle">已支付</i></span><?php  } else if($item['status'] == 3) { ?><span class="label label-danger">已退款</span><?php  } ?>
                    </td>					
                    <?php  } ?>					
					<td   class="qx_933" style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('baoming', array('id' => $item['id'], 'op' => 'tuifei', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认退费？');return false;" title="退费"><i class="fa fa-reply"></i></a>
						<?php  if($_W['isfounder']) { ?>
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('baoming', array('id' => $item['id'], 'op' => 'delete', 'schoolid' => $schoolid))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"><i class="fa fa-times"></i></a>
						<?php  } ?>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
			<tr>
				<td colspan="10">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                    <input type="button" class="btn btn-primary qx_934" name="btndeleteall" value="批量删除" />
				</td>
			</tr>
		</table>
        <?php  echo $pager;?>
    </form>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
	var category = <?php  echo json_encode($children)?>;
//-->
$(function(){
	<?php  if(!(IsHasQx($tid_global,1000933,1,$schoolid))) { ?>
		$(".qx_933").hide();
	<?php  } ?>
	<?php  if(!(IsHasQx($tid_global,1000934,1,$schoolid))) { ?>
		$(".qx_934").hide();
	<?php  } ?>
    $(".check_all").click(function(){
        var checked = $(this).get(0).checked;
        $("input[type=checkbox]").attr("checked",checked);
    });

    $("input[name=btndeleteall]").click(function(){
        var check = $("input[type=checkbox][class!=check_all]:checked");
        if(check.length < 1){
            alert('请选择要删除的订单!');
            return false;
        }
        if(confirm("确认要删除选择的订单?")){
            var id = new Array();
            check.each(function(i){
                id[i] = $(this).val();
            });
            var url = "<?php  echo $this->createWebUrl('baoming', array('op' => 'deleteall','schoolid' => $schoolid))?>";
            $.post(url,{idArr:id},
                function(data){
                    if(data.result){
					    alert(data.msg);
                        location.reload();
                    }else{
                        alert(data.msg);
                    }
                },'json');
        }
    });

});
</script>
<script type="text/javascript">
    <!--
    var category = <?php  echo json_encode($children)?>;
    //-->
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/footer', TEMPLATE_INCLUDEPATH)) : (include template('public/footer', TEMPLATE_INCLUDEPATH));?>