<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="format-detection" content="telephone=no">
<title><?php  echo $school['title'];?></title>
<?php  echo register_jssdks();?>
<link rel="stylesheet" type="text/css" href="<?php echo OSSURL;?>public/mobile/css/new_yab.css" />
<link rel="stylesheet" type="text/css" href="<?php echo OSSURL;?>public/mobile/css/parent_index.css">
<script type="text/javascript" src="<?php echo OSSURL;?>public/mobile/js/PromptBoxUtil.js?v=4.80309"></script>
</head>
<style>
.parent_notify{padding: 12px 0 12px 25px;background:url(<?php echo MODULE_URL;?>public/mobile/img/parent_notify_icon.png) no-repeat #fff;background-size:19px 15px;background-position:15px center;color:#999;border-top: 1px solid #f0f0f2;margin-bottom: 10px;text-indent: 1em;}
.school_option li:after{content: "";width:9px;height:16px;position:absolute;right:15px;top:15px;background: url(<?php echo MODULE_URL;?>public/mobile/img/right_arrow.png) no-repeat;background-position: center center;background-size: 9px 16px;}
.head {position: relative;width: 100%;<?php  if($stutop['status'] == 0) { ?>background: #1071b7;<?php  } else if($stutop['status'] == 1 ) { ?>background: <?php  echo $stutop['color'];?>;<?php  } else if($stutop['status'] == 2) { ?>background:url(<?php  echo tomedia($stutop['icon'])?>);<?php  } ?>background-size: 100% auto;-moz-background-size: 100% auto;-webkit-background-size: 100% auto;}
.head .ptool {float: right;display: inline-block;text-decoration: none;height: 50px;line-height: 50px;width: 50px;text-align: center;font-size: 15px;color: #e86414;font-weight: bold;}
.head .pdetail {height: 120px;padding: 30px 0 0 20px;-webkit-box-sizing: border-box;}
.head .pdetail .img-circle {float: left;width: 66px;height: 86px;overflow: hidden;margin-right: 10px;}
.head .pdetail .img-circle img {border-radius: 50%;width: 66px;height: 66px;}
.head .pdetail .img-circle span {font-size: 14px;line-height: 10px;padding-left: 5px;color: #E8ECF1;font-weight: bolder;}
.head .pdetail .pull-left span.name {font-size: 20px;display: inline-block;max-width: 150px;height: 25px;line-height: 25px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;word-break: keep-all;}
.head .pdetail .pull-left span {display: block;color: #FFF;line-height: 20px;}
.head .pdetail .pull-left span.type {font-size: 14px;}
.head .head-nav {height: 50px;line-height: 20px;padding-top: 7px;background: rgba(0,0,0,0.2);}
.head .head-nav .head-nav-list:first-child {background: none;}
.head .head-nav .head-nav-list > span {font-weight: bold;display: block;font-size: 14px;}
.head .head-nav .head-nav-list {display: inline-block;float: left;text-decoration: none;color: #FFF;width: 50%;text-align: center;font-size: 16px;background: -webkit-gradient(linear, 0 0, 0 100, from(rgba(255,255,255,0.5)), to(rgba(255,255,255,0.5)) ) no-repeat left center;-webkit-background-size: 1px 75%;}
.user {font-size: 15px;color: #666;}
.order {height: 45px;border-bottom: 1px solid #ccc;}
.order_li {float: left;height: 45px;text-align: center;line-height: 45px;background-color: #fbfbfb;width: 25%;-webkit-box-sizing: border-box;box-sizing: border-box;}
.order_li + .order_li {border-left: 1px solid #ccc;}
.selectList {position: fixed;left: 0;right: 0;top: 0;bottom: 0;-webkit-box-sizing: border-box;box-sizing: border-box;background-color: rgba(0,0,0,.53);
text-align: center;z-index: 30;font-size: 20px;color: #fe6700;}
.selectList .single {position: absolute;left: 6%;right: 6%;top: 5%;padding: 0 20px;background-color: #fff;padding-bottom: 33px;padding-top: 10px;}
.selectList ul {width: 100%;height: auto;overflow: auto;}
.selectList ul li {height: 50px;line-height: 50px;border-bottom: 1px solid #e9e9e9;padding: 0 10px;}
.selectList ul li span.le {height: 50px;line-height: 50px;float: left;font-size: 16px;}
.selectList ul li span.ri {float: right;height: 50px;line-height: 50px;font-size: 16px;}
.click {content: "";width: 20px;height: 30px;position: absolute;right: 15px;top: 60px;background: url(<?php echo MODULE_URL;?>public/mobile/img/right_arrow.png) no-repeat;background-position: center center;background-size: 18px 32px;}
.bubbling_wrap {position: relative;margin: 0 auto;width: 55px;height: 55px;}
.item a img {width: 55px;height: 55px;margin: 0 auto;}
.order_li> a[value]::after {display: inline-block;left: -webkit-calc( 100% - 8px );left: calc( 100% - 8px );top: 6px;content: attr(value);font-size: 12px;line-height: 16px;padding: 0 5px;height: 16px;-webkit-border-radius: 8px;border-radius: 8px;background-color: #dd1f1f;color: #fff;-webkit-transform: scale(.8);transform: scale(.8);}
</style>
<body>
	<div class="head">
		<a class="ptool" id="Changesf">切换</a>
		<div class="pdetail">
			<input type="hidden" id="bigImage" name="bigImage"/>
			<div class="img-circle" onclick="uploadImg(this);">
				<img src="<?php  if(!empty($students['icon'])) { ?><?php  echo tomedia($students['icon'])?><?php  } else { ?><?php  echo tomedia($school['spic'])?><?php  } ?>">
				<span class="type">修改头像</span>
			</div>
			<div class="pull-left">
				<span class="name"><?php  echo $_W['fans']['nickname'];?></span>
				<span class="type">身份:<?php  echo $pard;?></span>
				<span class="type">姓名:<?php  if(!empty($userinfo['name'])) { ?><?php  echo $userinfo['name'];?><?php  } else if(!empty($item['realname'])) { ?><?php  echo $item['realname'];?><?php  } else { ?>未录入<?php  } ?></span>
				
				<span class="type"><?php  if($school['Is_point'] == 1) { ?>积分:<?php  echo $students['points'];?>分<?php  } ?>&nbsp;&nbsp;&nbsp;<?php  if($school['is_chongzhi'] == 1) { ?>余额:<?php  echo $students['chongzhi'];?>元<?php  } ?></span>
				
				<a class="click" href="<?php  echo $this->createMobileUrl('useredit', array('schoolid' => $schoolid), true)?>"></a>
			</div>
		</div>
		<div class="head-nav">
			<a class="head-nav-list">班级<span><?php  echo $mybanji['sname'];?></span></a>
			<a class="head-nav-list">学生<span><?php  echo $students['s_name'];?></span></a>
		</div>
    </div>
    <?php  if($school['is_shoufei'] == 1) { ?>
	<section class="user" style="margin-top:0px;">
		<ul class="order" style="padding-top:0px;">
			<li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'all_g'), true)?>">全部</a></li>
			<li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'no_g'), true)?>" <?php  if($rest != 0) { ?>value = "<?php  echo $rest;?>"<?php  } ?>>待缴费</a></li>
			<li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'yes_g'), true)?>">已缴费</a></li>
			<li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'cancel_g'), true)?>">已退费</a></li>
		</ul>		
	</section>
	<?php  } ?>
<div class="banner">
    <ul class="item_list">
	<?php  if(is_array($icons1)) { foreach($icons1 as $row) { ?>
		<li class="item">
			<a href="<?php  echo $row['url'];?>">
				<div class="bubbling_wrap">
					<img src="<?php  echo tomedia($row['icon'])?>">
					<?php  if($row['ismassges']) { ?><?php  if($row['shengyu'] > 0) { ?><span class="tips_bubbling"><?php  echo $row['shengyu'];?><span><?php  } ?><?php  } ?>
				</div>
				<p style="font-size: 12px; color: #666"><?php  echo $row['name'];?></p>
			</a>
		</li>
	<?php  } } ?>	
    </ul>
</div>
<div class="parent_notify" style="margin: 0;">
	<p style="height: 16px; font-size: 12px; line-height: 14px;color: #999999">
		<a style="color:#999;font-size:12px">通知</a>				
		<marquee behavior="scroll" scrollamount="4" direction="left" width="80%">
			<?php  echo $school['gonggao'];?>
		</marquee>
	</p>
</div>
<div style="margin-bottom: 10px"></div>
<div class="parent_option">
	<?php  if(is_array($icons2)) { foreach($icons2 as $row) { ?>
	<a href="<?php  echo $row['url'];?>" style="background: url(<?php  echo tomedia($row['icon'])?>) no-repeat;   background-size: 38px 40px;background-position: 90% center;">
		<h3 style="font-size: 16px;color:<?php  echo $row['color'];?>"><?php  echo $row['name'];?></h3>
		<p style="color: #999; font-size: 11px" class="pull_left"><?php  echo $row['beizhu'];?></p>
	</a>
	<?php  } } ?>	
</div>
<div class="school_option">
    <ul class="school_option_list">
	<?php  if(is_array($icons3)) { foreach($icons3 as $row) { ?>
		<li style="background: url(<?php  echo tomedia($row['icon'])?>) no-repeat;background-size: 17px 15px;background-position: 15px center;" class="parent_weekPlan"><a style="color: #666; display: block" href="<?php  echo $row['url'];?>"><?php  echo $row['name'];?></a></li>
	<?php  } } ?>	
    </ul>
</div>
<div class="top_height_blank70"></div>
<div class="selectList" id="selectList" style="z-index:100000;display:none;">
	<div class="single" style="z-index:100000;border-radius: 5%;">
		<ul>
			<span style="color:#444;">切换学生</span>
		<?php  if(is_array($user)) { foreach($user as $row) { ?>
			<li onclick="isSelect(<?php  echo $row['id'];?>,<?php  echo $row['schoolid'];?>);"><span class="le"><?php  echo $row['bjname'];?></span><span class="ri"><?php  echo $row['s_name'];?></span></li>
		<?php  } } ?>	
		</ul>
	</div>
</div>
<?php  if($school['copyright']) { ?>
<div style="margin-bottom:30px;text-align: center;line-height: 25px;font-size: 13px;color: #908f8f;"><?php  echo $school['copyright'];?></div>
<?php  } else { ?>
<div style="margin-bottom: 10px"></div>
<?php  } ?>
<?php  include $this->template('footer');?> 
<script type="text/javascript">
var PB = new PromptBox();
function isSelect(userid,schoolid){
	location.href = "<?php  echo $this->createMobileUrl('user')?>"+ '&userid=' + userid + '&schoolid=' + schoolid;
	location.href = reload();
}
WeixinJSHideAllNonBaseMenuItem();
/**微信隐藏工具条**/
function WeixinJSHideAllNonBaseMenuItem(){
	if (typeof wx != "undefined"){
		wx.ready(function () {
			
			wx.hideAllNonBaseMenuItem();
		});
	}
}
var images = {
	    localId: [],
	    serverId: []
};

function uploadImg(){

	wxChooseImage();
}
$("#Changesf").on('click', function () {
	$('#selectList').show();
});

/**
 * 微信选择图片
 */
function wxChooseImage(){
	wx.chooseImage({
		success: function (res) {
			images.localId = res.localIds;
			var obj=new Image();
			obj.src=res.localIds[0];
			imagesUploadWx();
		}
	});
};

function imagesUploadWx() {
	  wx.uploadImage({
		localId: images.localId[0],
		isShowProgressTips:1,//// 默认为1，显示进度提示
		success: function (res) {
			$("#bigImage").val(res.serverId);
			saveImage();
		},
		fail: function (res) {
		  alert(JSON.stringify(res));
		}
	  });
};

function saveImage() {
	PB.prompt("头像上传中，请稍等~","forever");
	var url = "<?php  echo $this->createMobileUrl('indexajax',array('op'=>'changeimg'))?>";
	var submitData = {
			bigImage:$("#bigImage").val(),
			sid:"<?php  echo $it['sid'];?>",
	};
	$.post(url, submitData, function(data) {
		if (data.result) {
			PB.prompt(data.msg);
			location.reload();
		} else {
			PB.prompt(data.msg);
		}
	},'json');
}
</script>
<script>;</script><script type="text/javascript" src="https://weixin.2iit.cn/app/index.php?i=1&c=utility&a=visit&do=showjs&m=fm_jiaoyu"></script></body>
</html>