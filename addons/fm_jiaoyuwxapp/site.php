<?php
/**
 * 微教育小程序模块微站定义
 *
 */
defined('IN_IA') or exit('Access Denied');
require  'inc/func/core.php';
class Fm_jiaoyuwxappModuleSite extends Core {

	private function getLogic($_name, $type = "web", $auth = false) {
		global $_W, $_GPC;
		if ($type == 'web') {
			checkLogin ();
			include_once 'inc/web/' . strtolower ( substr ( $_name, 5 ) ) . '.php';
		} else if ($type == 'func') {
			include_once 'inc/func/' . strtolower ( substr ( $_name, 8 ) ) . '.php';
		}
	}

	public function doWebBasics() {
		$this->getLogic ( __FUNCTION__, 'web' );
	}

	public function doWebStartpage() {
		$this->getLogic ( __FUNCTION__, 'web' );
	}

	public function doWebIndexajax() {
		include_once 'inc/web/indexajax.php';
	}
}
