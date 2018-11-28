<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<link href="./resource/css/login.css" rel="stylesheet">
<div class="register-container container" style="position: absolute; width: 100%;">

    <div class="row clearfix">
        <div class="col-md-3"></div>
        <div class="register" style="width: 470px;" >
            <form action="" method="post" role="form" id="form1" onsubmit="return formcheck();">
                <a href="/index.php" class="login-logo">
                <img src="<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?><?php  echo tomedia($_W['setting']['copyright']['blogo']);?><?php  } else { ?>./resource/images/top-logo.png<?php  } ?>">
                </a>
             
					<div class="form-group input-group">
					
						<div class="input-group-addon"><i class="fa fa-user"></i></div>
						<input name="username" id="username" type="text" class="form-control "  placeholder="输入您的账号">

					</div>
					
					<div class="form-group input-group">
					
							<div class="input-group-addon"><i class="fa fa-key"></i></div>
						 <input type="password" id="password" name="password" placeholder="密码" class="form-control">

					</div>
					
             
				<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
					<div class="form-group input-group">
					
						<div class="input-group-addon" style="width: 36px;"><i class="fa fa-info"></i></div>
						<input name="verify" type="text" class="form-control" style="width:140px;" placeholder="请输入验证码">
						<a href="javascript:;" id="toggle" style="text-decoration: none">
						<img id="imgverify" src="<?php  echo url('utility/code')?>" style="height:45px;" title="点击图片更换验证码"/>
							<i class="fa fa-refresh" style="    font-size: 16px;color: #ccc;" aria-hidden="true"></i>
						</a>
					</div>
				<?php  } ?>
				
				
			
				<div class="pull-right" style="margin-bottom: 10px;">
				<!-- <input type="checkbox" value="true" id="rember" name="rember"> -->
					<!-- <label for="rember">记住用户名</label> -->
					<a href="<?php  echo url('user/find-password');?>" target="_blank"  style="color:white">忘记密码？</a>&nbsp;&nbsp;
                    <a href="<?php  echo url('user/register');?>"  style="    color: #f90b0b;font-weight: bold;"  target="_blank">立即注册</a>
				</div>
				
				
				
				<?php  if(!empty($_W['setting']['copyright']['demo'])) { ?><font color="red">[温馨提示]：默认测试账号：test，密码：test654321</font><?php  } ?>
                <input type="submit" name="submit" value="登录平台" class="btn btn-primary btn-lg btn-block ">
                <input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
             
				<?php  if(!empty($login_urls['qq']) || !empty($login_urls['wechat'])) { ?>
				<div class="text-center" style="margin-top:20px">
					<span class="color-gray">使用第三方账号登录</span>
					<div class="form-control-static">
						<?php  if(!empty($setting['thirdlogin']['qq']['authstate'])) { ?><a href="<?php  echo $login_urls['qq'];?>"><img src="./resource/images/qqlogin.png" width="35px"></a>&nbsp;&nbsp;<?php  } ?>
						<?php  if(!empty($setting['thirdlogin']['wechat']['authstate'])) { ?><a href="<?php  echo $login_urls['wechat'];?>"><img src="./resource/images/wxlogin.png" width="35px"></a><?php  } ?>
					</div>
				</div>
				<?php  } ?>
                <?php  if(!empty($_W['setting']['copyright']['is_check'])) { ?><br>
                <h2 style="text-align:center;margin-bottom: 30px;"></h2>
                <div class="self-check">
                    <h3>账号自助审核</h3>
                                        <p><span style="font-size: 18px;">如果您注册的账号没有通过审核<br>请扫描二维码关注后发送：<b>审核+用户名</b><br>例如你注册用户名是<b>wechat</b><br>则发送：<b>审核wechat（不用+号）</b></span><br><img src="<?php  if(!empty($_W['setting']['copyright']['ewm'])) { ?><?php  echo tomedia($_W['setting']['copyright']['ewm']);?><?php  } else { ?>./resource/images/ewm.jpg<?php  } ?>" width="300" height="300" style="margin-top: 12px;"></p>
                </div>
				<?php  } ?>
            </form>
        </div>
    </div>
</div>
<div id="large-header" >
		<canvas id="demo-canvas" >

  
  </canvas>
</div>
<script src="./resource/js/tweenlite.js" type="text/javascript"></script>
<script src="./resource/js/easepack.js" type="text/javascript"></script>
<script src="./resource/js/demo-1.js" type="text/javascript"></script>
<script>
function formcheck() {
	if($('#remember:checked').length == 1) {
		cookie.set('remember-username', $(':text[name="username"]').val());
	} else {
		cookie.del('remember-username');
	}
	return true;
}
var h = document.documentElement.clientHeight;
$(".system-login").css('height',h);
$('#toggle').click(function() {
	$('#imgverify').prop('src', '<?php  echo url('utility/code')?>r='+Math.round(new Date().getTime()));
	return false;
});
<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
	$('#form1').submit(function() {
		var verify = $(':text[name="verify"]').val();
		if (verify == '') {
			alert('请填写验证码');
			return false;
		}
	});
<?php  } ?>
</script>
</body>
</html>
