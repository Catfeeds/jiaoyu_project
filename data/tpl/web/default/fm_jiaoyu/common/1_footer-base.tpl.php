<?php defined('IN_IA') or exit('Access Denied');?></div>
	<div class="container-fluid footer text-center" role="footer">	
		<div class="friend-link">
			<?php  if(empty($_W['setting']['copyright']['footerright'])) { ?>
				<a href="https://weixin.2iit.cn">小象教育</a>
				<a href="https://weixin.2iit.cn">小象传媒</a>
				<a href="https://weixin.2iit.cn">小象论坛</a>
				<a href="https://weixin.2iit.cn">联系客服</a>
			<?php  } else { ?>
				<?php  echo $_W['setting']['copyright']['footerright'];?>
			<?php  } ?>
		</div>
		<div class="copyright"><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.we7.cc"><b>小象</b></a> v<?php echo IMS_VERSION;?> &copy; 2014-2015 <a href="https://weixin.2iit.cn">小象</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></div>
		<?php  if(!empty($_W['setting']['copyright']['icp'])) { ?><div>备案号：<a href="http://www.miitbeian.gov.cn" target="_blank"><?php  echo $_W['setting']['copyright']['icp'];?></a></div><?php  } ?>
	</div>
	<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
	<?php  if(!empty($_GPC['m']) && !in_array($_GPC['m'], array('keyword', 'special', 'welcome', 'default', 'userapi')) || defined('IN_MODULE')) { ?>
	<script>
		if(typeof $.fn.tooltip != 'function' || typeof $.fn.tab != 'function' || typeof $.fn.modal != 'function' || typeof $.fn.dropdown != 'function') {
			require(['bootstrap']);
		}
	</script>
	<?php  } ?>
	</div>
	
		<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>web/index.php?c=utility&a=visit&do=showjs&type=<?php echo FRAME;?>"></script>
	
</body>
</html>