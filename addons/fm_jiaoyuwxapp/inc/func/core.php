<?php
/**
 * 微教育模块
 *
 * @author 高贵血迹
 */
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
define('OSSURL', $_W['sitescheme'].'weimeizhanoss.oss-cn-shenzhen.aliyuncs.com/');
class Core extends WeModuleSite {

	// ===============================================
	public $m = 'wx_school';
	public $table_assteach = 'wx_school_assteach';
	public $table_classify = 'wx_school_classify';
	public $table_points = 'wx_school_points';
	public $table_pointsrecord = 'wx_school_pointsrecord';
	public $table_address = 'wx_school_address';
	public $table_mall = 'wx_school_mall';
	public $table_mallorder = 'wx_school_mallorder';
	public $table_score = 'wx_school_score';
	public $table_news = 'wx_school_news';
	public $table_index = 'wx_school_index';
	public $table_students = 'wx_school_students';
	public $table_tcourse = 'wx_school_tcourse';
	public $table_teachers = 'wx_school_teachers';
	public $table_area = 'wx_school_area';
    public $table_type = 'wx_school_type';
    public $table_kcbiao = 'wx_school_kcbiao';
	public $table_cook = 'wx_school_cookbook';
	public $table_reply = 'wx_school_reply';
	public $table_banners = 'wx_school_banners';
	public $table_bbsreply = 'wx_school_bbsreply';
	public $table_user = 'wx_school_user';
	public $table_set = 'wx_school_set';
	public $table_leave = 'wx_school_leave';
	public $table_notice = 'wx_school_notice';
	public $table_bjq = 'wx_school_bjq';
	public $table_media = 'wx_school_media';
	public $table_dianzan = 'wx_school_dianzan';
	public $table_order = 'wx_school_order';
    public $table_wxpay = 'wx_school_wxpay';
    public $table_group = 'wx_school_fans_group';
	public $table_qrinfo = 'wx_school_qrcode_info';
	public $table_qrset = 'wx_school_qrcode_set';
	public $table_qrstat = 'wx_school_qrcode_statinfo';
	public $table_cost = 'wx_school_cost';
	public $table_object = 'wx_school_object';
	public $table_signup = 'wx_school_signup';
	public $table_record = 'wx_school_record';
	public $table_checkmac = 'wx_school_checkmac';
	public $table_checklog = 'wx_school_checklog';
	public $table_idcard = 'wx_school_idcard';
	public $table_icon = 'wx_school_icon';
	public $table_timetable = 'wx_school_timetable';
	public $table_zjh = 'wx_school_zjh';
	public $table_zjhset = 'wx_school_zjhset';
	public $table_zjhdetail = 'wx_school_zjhdetail';
	public $table_scset = 'wx_school_shouceset';
	public $table_scicon = 'wx_school_shouceseticon';
	public $table_sc = 'wx_school_shouce';
	public $table_scpy = 'wx_school_shoucepyk';
	public $table_scforxs = 'wx_school_scforxs';
	public $table_allcamera = 'wx_school_allcamera';
	public $table_camerapl = 'wx_school_camerapl';
	public $table_class = 'wx_school_user_class';
	public $table_online = 'wx_school_online';
	public $table_questions = 'wx_school_questions';
	public $table_answers = 'wx_school_answers';
	public $table_wxappset = 'wx_school_wxappset';	
}

function Convert_BD09_To_GCJ02($lat,$lng){
        $x_pi = 3.14159265358979324 * 3000.0 / 180.0;
        $x = $lng - 0.0065;
        $y = $lat - 0.006;
        $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $x_pi);
        $theta = atan2($y, $x) - 0.000003 * cos($x * $x_pi);
        $lng = $z * cos($theta);
        $lat = $z * sin($theta);
        return array('lng'=>$lng,'lat'=>$lat);
}
/** 
* @desc 根据两点间的经纬度计算距离 
* @param float $lat 纬度值 
* @param float $lng 经度值 
*/
function getDistance($lat1, $lng1, $lat2, $lng2) { 
	$earthRadius = 6367000; //approximate radius of earth in meters 
	 
	/* 
	Convert these degrees to radians 
	to work with the formula 
	*/
	 
	$lat1 = ($lat1 * pi() ) / 180; 
	$lng1 = ($lng1 * pi() ) / 180; 
	 
	$lat2 = ($lat2 * pi() ) / 180; 
	$lng2 = ($lng2 * pi() ) / 180; 
	 
	/* 
	Using the 
	Haversine formula 
	 
	http://en.wikipedia.org/wiki/Haversine_formula 
	 
	calculate the distance 
	*/
	 
	$calcLongitude = $lng2 - $lng1; 
	$calcLatitude = $lat2 - $lat1; 
	$stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2); 
	$stepTwo = 2 * asin(min(1, sqrt($stepOne))); 
	$calculatedDistance = $earthRadius * $stepTwo; 
	 
	return round($calculatedDistance); 
}

function getoauthurl(){
	$oauthurl = $_SERVER ['HTTP_HOST'];
	return $oauthurl;
}

function checkvers(){
	load()->func('communication');
	$oauthurl = getoauthurl();
	$url = 'http://www.daren007.com/api/gethls.php';
	$data = array(
		'checkver'   => 'checkver',
		'oauthurl' => $oauthurl
	);	
	$postdata = ihttp_post($url, $data);
	if($postdata['code'] ==200){
		$respoed = json_decode($postdata['content'],true);
		if($respoed){
			return($respoed['versions']);
		}
		exit;
	}else{
		return ("访问服务器失败,请检测您的服务器相关设置,错误代码".$postdata['code']);
		exit;				
	}
}