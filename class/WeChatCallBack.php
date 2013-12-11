<?php
/**
 * 
 * wechat basic callback
 * @author pacozhong
 *
 */

require_once dirname(__FILE__) . '/../utils/Common.php';
class WeChatCallBack {
	protected $_postObject;
	protected $_fromUserName;
	protected $_toUserName;
	protected $_createTime;
	protected $_msgType;
	protected $_msgId;
	protected $_time;
	
    public function getToUserName() {
    	return $this->_toUserName;
    }
    
    protected  function makeHint($hint) {
    	$resultStr = sprintf ( HINT_TPL, $this->_fromUserName, $this->_toUserName, $this->_time, 'text', $hint );
		interface_log(INFO, EC_OK, "makeHint:" . $resultStr);
		return $resultStr;
    }
	
	protected function makeHintVoice($hint) {
		//TODO:
		return makeHint($hint);
	}
	
	protected function makeHintPic($hint) {
		//TODO:
		return makeHint($hint);
	}
	
	protected function makeHintPicNText($hint) {
		//TODO:
		return makeHint($hint);
	}
	
	protected function makeHintVideo($hint) {
		//TODO:
		return makeHint($hint);
	}
	
	protected function makeHintMusic($hint) {
		//TODO:
		return makeHint($hint);
	}
	
	public function init($postObj) {
		// 获取参数
		$this->_postObject = $postObj;
		if ($this->_postObject == false) {
			return false;
		}
		$this->_fromUserName = ( string ) trim ( $this->_postObject->FromUserName );
		$this->_toUserName = ( string ) trim ( $this->_postObject->ToUserName );
		$this->_msgType = ( string ) trim ( $this->_postObject->MsgType );
		$this->_createTime = ( int ) trim ( $this->_postObject->CreateTime );
		$this->_msgId = ( int ) trim ( $this->_postObject->MsgId );
		$this->_time = time ();
		if(!($this->_fromUserName && $this->_toUserName && $this->_msgType)) {
			interface_log(INFO, EC_OK, "Info Missing");
			return false;
		}
		return true;
	}
	
	public function process() {
		return $this->makeHint(HINT_NOT_IMPLEMEMT);
	}
	
    
   		
}