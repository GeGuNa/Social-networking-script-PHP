<?php



/////////////////////////



function royal_flush($arr){
  $a = array();
  array_push($a, 1,10,11, 12, 13);
  $combination = $arr[0][1];

  $pok = false;
  for($i=0; $i<count($arr); $i++){
    if($arr[$i][1] == $combination){
      $pok = true;
    } else{
      $pok = false;
    }
  }

  if($pok == ""){
    return 0;
  } else{
    $res = array();
    for($i=0; $i<count($arr); $i++){
      array_push($res, $arr[$i][0]);
    }

    sort($res);
    if($res == $a){
      return 1;
    } else{
      return 0;
    }
  }
}

// get five random cards
function get_five_cards($arr1, $arr2) {
    $res = array();
    for ($i=0; $i < 5; $i++) {
      $x1= rand(0, 12);
      $x2 = rand(0,3);
      $y = array();
      array_push($y,$arr1[$x1], $arr2[$x2]);
      array_push($res, $y);
    }
    return $res;
  }

// check for increment
function increment($arr){
  $first = $arr[0];
  $in_seq = false;
  $i = 0;

  while($i<count($arr)-1){
    if($arr[$i+1]-$arr[$i] == 1){
      $in_seq = true;
      $i += 1;
    } else{
      $in_seq = false;
      break;
    }
  }

  return $in_seq;
}

// straight flush
function straight_flush($arr){
  $combination = $arr[0][1];

  //find suits
  $pok = false;
  for($i=0; $i<count($arr); $i++){
    if($arr[$i][1] == $combination){
      $pok = true;
    } else{
      $pok = false;
    }
  }

  if($pok == ""){
    return 0;
  } else{
    $res = array();
    for($i=0; $i<count($arr); $i++){
      array_push($res, $arr[$i][0]);
    }
    sort($res);
    $straight = increment($res);
    if($straight == ""){
      return 0;
    } else{
      return 1;
    }
  }
}
//find if it is straight
function straight($arr){
  $res = array();
  for($i=0; $i<count($arr); $i++){
    array_push($res, $arr[$i][0]);
  }
  sort($res);
  $straight = increment($res);
  if($straight == ""){
    return 0;
  } else{
    return 1;
  }
}













// driver code
function find_output(){
  $num = array(1,2,3,4,5,6,7,8,9,10,11,12,13);
  $suits = array('spade','heart','club','diamond');
  $count_royal_flush = 0;
  $count_straight_flush = 0;
  $count_straight = 0;

  for ($i=0; $i < 10000; $i++) {
    $decks = get_five_cards($num, $suits);
    $count_royal_flush += royal_flush($decks);
    $count_straight_flush += straight_flush($decks);
    $count_straight += straight($decks);
  }
  echo "<div>";
  print_r("Simulating Poker Game 10000 times we get ");
  echo "<br>";
  echo "<br>";
  echo "<br>";
  Print_r("Number of Royal Flush: ".$count_royal_flush);
  echo "<br>";
  echo "<br>";
  print_r("Number of Straight Flush: ".$count_straight_flush);
  echo "<br>";
  echo "<br>";
  print_r("Number of Straight: ".$count_straight);
  echo"</div>";
  }


// for royal flush
function royal_flush($arr){
  $a = array();
  array_push($a, 1,10,11, 12, 13);
  $combination = $arr[0][1];

  $pok = false;
  for($i=0; $i<count($arr); $i++){
    if($arr[$i][1] == $combination){
      $pok = true;
    } else{
      $pok = false;
    }
  }

  if($pok == ""){
    return 0;
  } else{
    $res = array();
    for($i=0; $i<count($arr); $i++){
      array_push($res, $arr[$i][0]);
    }

    sort($res);
    if($res == $a){
      return 1;
    } else{
      return 0;
    }
  }
}

// get five random cards
function get_five_cards($arr1, $arr2) {
    $res = array();
    for ($i=0; $i < 5; $i++) {
      $x1= rand(0, 12);
      $x2 = rand(0,3);
      $y = array();
      array_push($y,$arr1[$x1], $arr2[$x2]);
      array_push($res, $y);
    }
    return $res;
  }

// check for increment
function increment($arr){
  $first = $arr[0];
  $in_seq = false;
  $i = 0;

  while($i<count($arr)-1){
    if($arr[$i+1]-$arr[$i] == 1){
      $in_seq = true;
      $i += 1;
    } else{
      $in_seq = false;
      break;
    }
  }

  return $in_seq;
}

// straight flush
function straight_flush($arr){
  $combination = $arr[0][1];

  //find suits
  $pok = false;
  for($i=0; $i<count($arr); $i++){
    if($arr[$i][1] == $combination){
      $pok = true;
    } else{
      $pok = false;
    }
  }

  if($pok == ""){
    return 0;
  } else{
    $res = array();
    for($i=0; $i<count($arr); $i++){
      array_push($res, $arr[$i][0]);
    }
    sort($res);
    $straight = increment($res);
    if($straight == ""){
      return 0;
    } else{
      return 1;
    }
  }
}
//find if it is straight
function straight($arr){
  $res = array();
  for($i=0; $i<count($arr); $i++){
    array_push($res, $arr[$i][0]);
  }
  sort($res);
  $straight = increment($res);
  if($straight == ""){
    return 0;
  } else{
    return 1;
  }
}



/////////////////////////



public function ipAddress()
	{
		$addrs = array();
		
		if ( \IPS\Settings::i()->xforward_matching )
		{
			if( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
			{
				foreach( explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] ) as $x_f )
				{
					$addrs[] = trim( $x_f );
				}
			}

			if( isset( $_SERVER['HTTP_CLIENT_IP'] ) )
			{
				$addrs[] = $_SERVER['HTTP_CLIENT_IP'];
			}
			
			if ( isset( $_SERVER['HTTP_X_CLIENT_IP'] ) )
			{
				$addrs[] = $_SERVER['HTTP_X_CLIENT_IP'];
			}

			if( isset( $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] ) )
			{
				$addrs[] = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			}

			if( isset( $_SERVER['HTTP_PROXY_USER'] ) )
			{
				$addrs[] = $_SERVER['HTTP_PROXY_USER'];
			}
		}
		
		if ( isset( $_SERVER['REMOTE_ADDR'] ) )
		{
			$addrs[] = $_SERVER['REMOTE_ADDR'];
		}
		
		foreach ( $addrs as $ip )
		{
			if ( filter_var( $ip, FILTER_VALIDATE_IP ) )
			{
				return $ip;
			}
		}

		return '';
	}

	Function legacyEscape( $val )
	{
		$val = (string) $val;
		
		$val = str_replace( "&"			, "&amp;"         , $val );
		$val = str_replace( "<!--"		, "&#60;&#33;--"  , $val );
		$val = str_replace( "-->"			, "--&#62;"       , $val );
		$val = str_ireplace( "<script"	, "&#60;script"   , $val );
		$val = str_replace( ">"			, "&gt;"          , $val );
		$val = str_replace( "<"			, "&lt;"          , $val );
		$val = str_replace( '"'			, "&quot;"        , $val );
		$val = str_replace( "\n"			, "<br />"        , $val );
		$val = str_replace( "$"			, "&#036;"        , $val );
		$val = str_replace( "!"			, "&#33;"         , $val );
		$val = str_replace( "'"			, "&#39;"         , $val );
		$val = str_replace( "\\"			, "&#092;"        , $val );
		
		return $val;
	}


function dget($k) {
	return isset($_GET[$k]) ? $_GET[$k] : null;
}

function dpost($k) {
	return isset($_POST[$k]) ? $_POST[$k] : null;
}



function dsetcookie($var, $value = '', $life = 0, $prefix = 1, $httponly = false) {

	global $_G;

	$config = $_G['config']['cookie'];

	$_G['cookie'][$var] = $value;
	$var = ($prefix ? $config['cookiepre'] : '').$var;
	$_COOKIE[$var] = $value;

	if($value === '' || $life < 0) {
		$value = '';
		$life = -1;
	}

	if(defined('IN_MOBILE')) {
		$httponly = false;
	}

	$life = $life > 0 ? getglobal('timestamp') + $life : ($life < 0 ? getglobal('timestamp') - 31536000 : 0);
	$path = $httponly && PHP_VERSION < '5.2.0' ? $config['cookiepath'].'; HttpOnly' : $config['cookiepath'];

	$secure = $_G['isHTTPS'];
	if(PHP_VERSION < '5.2.0') {
		setcookie($var, $value, $life, $path, $config['cookiedomain'], $secure);
	} else {
		setcookie($var, $value, $life, $path, $config['cookiedomain'], $secure, $httponly);
	}
}

function getcookie($key) {
	global $_G;
	return isset($_G['cookie'][$key]) ? $_G['cookie'][$key] : '';
}



function fileext($filename) {
	return addslashes(strtolower(substr(strrchr($filename, '.'), 1, 10)));
}



function checkrobot($useragent = '') {
/*vot*/	static $kw_spiders = array('bot', 'crawl', 'spider' ,'slurp', 'sohu-search', 'lycos', 'robozilla', 'apis-google', 'mediapartners-google');
	static $kw_browsers = array('msie', 'netscape', 'opera', 'konqueror', 'mozilla');

/*vot*/	$useragent = strtolower(empty($useragent) ? @$_SERVER['HTTP_USER_AGENT'] : $useragent);
	if(dstrpos($useragent, $kw_spiders)) return true;
/*vot*/	if(!preg_match('/^https?:\/\//is',$useragent) && dstrpos($useragent, $kw_browsers)) return false;
	return false;
}
function checkmobile() {
	global $_G;
	$mobile = array();
	static $touchbrowser_list =array('iphone', 'android', 'phone', 'mobile', 'wap', 'netfront', 'java', 'opera mobi', 'opera mini',
				'ucweb', 'windows ce', 'symbian', 'series', 'webos', 'sony', 'blackberry', 'dopod', 'nokia', 'samsung',
				'palmsource', 'xda', 'pieplus', 'meizu', 'midp', 'cldc', 'motorola', 'foma', 'docomo', 'up.browser',
				'up.link', 'blazer', 'helio', 'hosin', 'huawei', 'novarra', 'coolpad', 'webos', 'techfaith', 'palmsource',
				'alcatel', 'amoi', 'ktouch', 'nexian', 'ericsson', 'philips', 'sagem', 'wellcom', 'bunjalloo', 'maui', 'smartphone',
				'iemobile', 'spice', 'bird', 'zte-', 'longcos', 'pantech', 'gionee', 'portalmmm', 'jig browser', 'hiptop',
				'benq', 'haier', '^lct', '320x320', '240x320', '176x220', 'windows phone');
	static $wmlbrowser_list = array('cect', 'compal', 'ctl', 'lg', 'nec', 'tcl', 'alcatel', 'ericsson', 'bird', 'daxian', 'dbtel', 'eastcom',
			'pantech', 'dopod', 'philips', 'haier', 'konka', 'kejian', 'lenovo', 'benq', 'mot', 'soutec', 'nokia', 'sagem', 'sgh',
			'sed', 'capitel', 'panasonic', 'sonyericsson', 'sharp', 'amoi', 'panda', 'zte');

	static $pad_list = array('ipad');

/*vot*/	$useragent = strtolower(@$_SERVER['HTTP_USER_AGENT']);

	if(dstrpos($useragent, $pad_list)) {
		return false;
	}
	if(($v = dstrpos($useragent, $touchbrowser_list, true))){
		$_G['mobile'] = $v;
/*vot*/		return '2'; //Touch-Screen Version
	}
	if(($v = dstrpos($useragent, $wmlbrowser_list))) {
		$_G['mobile'] = $v;
/*vot*/		return '3'; //WML Version
	}
	$brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave');
	if(dstrpos($useragent, $brower)) return false;

	$_G['mobile'] = 'unknown';
	if(isset($_G['mobiletpl'][$_GET['mobile']])) {
		return true;
	} else {
		return false;
	}
}

function dstrpos($string, $arr, $returnvalue = false) {
	if(empty($string)) return false;
	foreach((array)$arr as $v) {
		if(strpos($string, $v) !== false) {
			$return = $returnvalue ? $v : true;
			return $return;
		}
	}
	return false;
}

function isemail($email) {
	return strlen($email) > 6 && strlen($email) <= 255 && preg_match("/^([A-Za-z0-9\-_.+]+)@([A-Za-z0-9\-]+[.][A-Za-z0-9\-.]+)$/", $email);
}

function quescrypt($questionid, $answer) {
	return $questionid > 0 && $answer != '' ? substr(md5($answer.md5($questionid)), 16, 8) : '';
}


function random($length, $numeric = 0) {
	$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	if($numeric) {
		$hash = '';
	} else {
		$hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
		$length--;
	}
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $seed[mt_rand(0, $max)];
	}
	return $hash;
}



function secrandom($length, $numeric = 0, $strong = false) {
	// Thank you @popcorner for your strong support for the enhanced security of the function.
	$chars = $numeric ? array('A','B','+','/','=') : array('+','/','=');
	$num_find = str_split('CDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
	$num_repl = str_split('01234567890123456789012345678901234567890123456789');
	$isstrong = false;
	if(function_exists('random_bytes')) {
		$isstrong = true;
		$random_bytes = function($length) {
			return random_bytes($length);
		};
	} elseif(extension_loaded('mcrypt') && function_exists('mcrypt_create_iv')) {
		// for lower than PHP 7.0, Please Upgrade ASAP.
		$isstrong = true;
		$random_bytes = function($length) {
			$rand = mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
			if ($rand !== false && strlen($rand) === $length) {
				return $rand;
			} else {
				return false;
			}
		};
	} elseif(extension_loaded('openssl') && function_exists('openssl_random_pseudo_bytes')) {
		// for lower than PHP 7.0, Please Upgrade ASAP.
		// openssl_random_pseudo_bytes() does not appear to cryptographically secure
		// https://github.com/paragonie/random_compat/issues/5
		$isstrong = true;
		$random_bytes = function($length) {
			$rand = openssl_random_pseudo_bytes($length, $secure);
			if($secure === true) {
				return $rand;
			} else {
				return false;
			}
		};
	}
	if(!$isstrong) {
		return $strong ? false : random($length, $numeric);
	}
	$retry_times = 0;
	$return = '';
	while($retry_times < 128) {
		$getlen = $length - strlen($return); // 33% extra bytes
		$bytes = $random_bytes(max($getlen, 12));
		if($bytes === false) {
			return false;
		}
		$bytes = str_replace($chars, '', base64_encode($bytes));
		$return .= substr($bytes, 0, $getlen);
		if(strlen($return) == $length) {
			return $numeric ? str_replace($num_find, $num_repl, $return) : $return;
		}
		$retry_times++;
	}
}

function strexists($string, $find) {
	return !(strpos($string, $find) === FALSE);
}


function sizecount($size) {
	if($size >= 1073741824) {
		$size = round($size / 1073741824 * 100) / 100 . ' GB';
	} elseif($size >= 1048576) {
		$size = round($size / 1048576 * 100) / 100 . ' MB';
	} elseif($size >= 1024) {
		$size = round($size / 1024 * 100) / 100 . ' KB';
	} else {
		$size = intval($size) . ' Bytes';
	}
	return $size;
}
