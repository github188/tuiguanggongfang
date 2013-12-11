<?php
$startTime = microtime(true);
require_once dirname(__FILE__) . '/utils/Common.php';

function checkSignature() {
	$signature = $_GET["signature"];
	$timestamp = $_GET["timestamp"];
	$nonce = $_GET["nonce"];
	
	$token = WEIXIN_TOKEN;
	$tmpArr = array($token, $timestamp, $nonce);
	sort($tmpArr);
	$tmpStr = implode($tmpArr);
	$tmpStr = sha1($tmpStr);
	
	if ($tmpStr == $signature) {
		return true;
	} else {
		return false;
	}
}

//if (checkSignature()) {
//	if ($_GET["echostr"]) {
//		echo $_GET["echostr"];
//		exit(0);
//	} else {
//		$ip = getIp();
//		interface_log(ERROR, EC_OTHER, 'malicious: ' . $ip);
//		exit(0);
//	}
//}

function getWeChatObj($toUserName) {
	if ($toUserName == USERNAME_TGGF) {
		require_once dirname(__FILE__) . '/class/WeChatTGGFCallback.php';
		return new WeChatCallbackTGGF();
	}
	
	require_once dirname(__FILE__) . '/class/WeChatCallBack.php';
	return new WeChatCallBack();
}

function exitErrorInput() {
	echo 'error input!';
	interface_log(INFO, EC_OK, "******** interface request end ********");
	interface_log(INFO, EC_OK, "***************************************");
	interface_log(INFO, EC_OK, "");
	exit(0);
}

$postStr = file_get_contents("php://input");

interface_log(INFO, EC_OK, "");
interface_log(INFO, EC_OK, "*************************************");
interface_log(INFO, EC_OK, "***** interface request start *******");
interface_log(INFO, EC_OK, 'request:'. $postStr);
interface_log(INFO, EC_OK, 'get:' .var_export($_GET, true));

if (empty($postStr)) {
	interface_log(ERROR, EC_OK, "error_input!");
	exitErrorInput();
}

$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
if (NULL == $postObj) {
	interface_log(ERROR, 0, "can not decode xml");
	exit(0);
}

interface_log(INFO, EC_OK, "postObj" . $postObj);

$toUserName = (string) trim($postObj->ToUserName);
if (!$toUserName) {
	interface_log(ERROR, EC_OK, "error input!");
	exitErrorInput();
} else {
	$wechatObj = getWeChatObj($toUserName);
}

$ret = $wechatObj->init($postObj);
if (!$ret) {
	interface_log(ERROR, EC_OK, "error input!");
	exitErrorInput();
}

$retStr = $wechatObj->process();
interface_log(INFO, EC_OK, "response:" . $retStr);
echo $retStr;

interface_log(INFO, EC_OK, "***** interface request end ******");
interface_log(INFO, EC_OK, "**********************************");
interface_log(INFO, EC_OK, "");
$useTime = microtime(true) - $startTime;
interface_log(INFO, EC_OK, "cost time:" .$useTime . " " . ($useTime > 4 ? "warning" : ""));
?>