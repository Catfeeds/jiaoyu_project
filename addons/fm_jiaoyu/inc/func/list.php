<?php
/**
 * By 高贵血迹
 */
global $_W, $_GPC;
$weid = $_W['uniacid'];
if($_W['isfounder'] || $_W['role'] == 'owner' || $_W['role'] == 'vice_founder') {
	$where = "WHERE weid = '{$weid}'";
}else{
	$uid = $_W['user']['uid'];	
	$where = "WHERE weid = '{$weid}' And uid = '{$uid}' And is_show = 1 ";		
}

$schoollist = pdo_fetchall("SELECT id,title,logo FROM " . tablename($this->table_index) . " $where   order by ssort DESC");

$state = pdo_fetch("SELECT * FROM ".tablename('uni_account_users')." WHERE uid = :uid And uniacid = :uniacid", array(':uid' => $_W['uid'],':uniacid' => $_W['uniacid']));
$_W['role']  = $state['role'];

$myadmin = pdo_fetch("SELECT tid,schoolid FROM ".tablename('users')." WHERE uid = :uid And uniacid = :uniacid", array(':uid' => $_W['uid'],':uniacid' => $_W['uniacid']));

$schoolid = intval($_GPC['schoolid']);

$thisindex = pdo_fetch("SELECT weid FROM " . tablename($this->table_index) . " WHERE id = '{$schoolid}' ");

$doarray = array('indexajax','school','help');
if($thisindex['weid'] != $weid && !in_array($_GPC['do'], $doarray) ){
	message('当前登录公众号下无学校数据，请切换公众号', './index.php?c=home&a=welcome&do=platform&', 'error');
}
if(!$_W['isfounder'] && $_W['role'] != 'owner' && $_W['role'] != 'vice_founder') {
	if ($myadmin['schoolid'] != $schoolid){
		message('非法访问！', $_W['siteroot'].'addons/fm_jiaoyu/admin');
	}else{
		$mysf = pdo_fetch("SELECT tname,thumb,fz_id FROM ".tablename($this->table_teachers)." WHERE schoolid = :schoolid And id = :id", array(':schoolid' => $schoolid,':id' => $myadmin['tid']));
		$myfz = pdo_fetch("SELECT sname,pname FROM ".tablename($this->table_classify)." WHERE schoolid = :schoolid And sid = :sid", array(':schoolid' => $schoolid,':sid' => $mysf['fz_id']));
		$myfz['sname'] = $myfz['pname'];
		$_W['tid'] = $myadmin['tid'];
	}
}else{
	if($_W['isfounder']){
		$_W['tid'] = 'founder';
	}
	if($_W['role'] == 'owner' || $_W['role'] == 'vice_founder'){
		$_W['tid'] = 'owner';
	}	
}

$fenzu = pdo_fetch("SELECT id FROM ".tablename($this->table_group)." WHERE schoolid = :schoolid And is_zhu = :is_zhu", array(':schoolid' => $schoolid,':is_zhu' => 1));
if($fenzu){
	$code = pdo_fetch("SELECT * FROM ".tablename($this->table_qrinfo)." WHERE gpid = :gpid ", array(':gpid' => $fenzu['id']));
}
?>