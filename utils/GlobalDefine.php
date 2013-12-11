<?php 
//require_once dirname(__FILE__).'/ErrorCode.php';
define('ROOT_PATH', dirname(__FILE__) . '/../');
//define('ROOT_PATH', dirname(__FILE__));
define('DEFAULT_CHARSET', 'utf-8');
define('COMPONENT_VERSION', '1.0');
define('COMPONENT_NAME', 'wxmp');

//关闭NOTICE错误日志
error_reporting(E_ALL ^ E_NOTICE);

define('WX_API_URL', "https://api.weixin.qq.com/cgi-bin/");

define('USERNAME_TGGF', 'gh_0c12acda9bf1');
define("WEIXIN_TOKEN", "kevin");
define("HINT_NOT_IMPLEMEMT", "未实现");
define('HINT_TPL', "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[%s]]></MsgType>
  <Content><![CDATA[%s]]></Content>
  <FuncFlag>0</FuncFlag>
</xml>
");

define('TGGF_HINT_HELLO', "您好，欢迎来到店面推广工坊，别忘了发文字信息和我互动哟，这里不仅仅是推广哦");
define('TGGF_HINT_INNER_ERROR', "真是抱歉，我们的服务器发生了内部错误，烦请稍后再试");
define('HINT_GUIDE_TPL', "<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[news]]></MsgType>
  <ArticleCount>%s</ArticleCount>
  <Articles>
  <item>
  <Title><![CDATA[%s]]></Title> 
  <Description><![CDATA[%s]]></Description>
  <PicUrl><![CDATA[%s]]></PicUrl>
  <Url><![CDATA[%s]></Url>
  </item>
  <item>
  <Title><![CDATA[%s]]></Title>
  <Description><![CDATA[%s]]></Description>
  <PicUrl><![CDATA[%s]]></PicUrl>
  <Url><![CDATA[%s]]></Url>
  </item>
  </Articles>
  </xml>"); 

//tuiguanggongfang defines
define('TGGF_HINT', "欢迎关注推广工坊");
define('FF_HINT_INNER_ERROR', "内部错误");

$GLOBALS['DB'] = array(
	'TGGF' => array(
		'HOST' => 'localhost',
		'DBNAME' => 'neuseeke_tggf',
		'USER' => 'neuseeke_wmaster',
		'PASSWD' => 'kevinLike$',
		'PORT' => 3306
	)
);
