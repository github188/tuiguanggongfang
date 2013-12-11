<?php
require_once dirname(__FILE__) . '/WeChatCallBack.php';

class WeChatCallbackTGGF extends WeChatCallBack{
	private $_content;
	private $_oUserTable;
	private $_oCmdTable;
	
	public function init($postObj) {
		//TODO:
		if (false == parent::init($postObj)) {
			interface_log(ERROR, EC_OTHER, "init fail!");
			return false;
		}
		
		try {
			$this->_oUserTable = new SingleTableOperation('neuseeker_tggf_users', 'TGGF');
			$this->_oCmdTable = new SingleTableOperation('neuseeker_tggf_textcmd', 'TGGF');
		} catch (Exception $e) {
			interface_log(ERROR, EC_DB_OP_EXCEPTION, $e->getMessage());
			return $this->makeFF_HINT(FF_HINT_INNER_ERROR);
		}
		
		return true;
	}
	
	public function process() {
		if (false === $this->_registerUser()) {
			return $this->makeHint(TGGF_HINT_INNER_ERROR);
		}
		
		if ($this->_msgType != 'text') {
			return $this->makeHint(TGGF_HINT_HELLO);
		}
		
		$this->_content = (string) trim($this->_postObject->Content);
		
		if (false === $this->isOrderCommand($this->_content)) {
			return $this->makeHint(TGGF_HINT_HELLO);
		}
		
		return $this->responseOrder($this->_content);
	}
	
	private function _registerUser() {
		try {
			$ret = $this->_oUserTable->getObject(array('userName' => $this->_fromUserName));
			if (empty($ret)) {
				$this->_oUserTable->addObject(array('userName' => $this->_fromUserName));
			}
			return true;
		} catch (Exception $e) {
			interface_log(ERROR, EC_DB_OP_EXCEPTION, $e->getMessage());
			return false;
		}
	}
	
	
	private function makeFF_HINT($hint) {
		//TODO:
		$this->makeHint($hint);
	}
	
	private function responseOrder($hint) {
		try {
			$ret = $this->_oCmdTable->getObject(array('cmd' => $hint));
			if (empty($ret)) {
				return $this->makeHint(TGGF_HINT_HELLO);
			}

			return $this->makeHint($ret);
			
		} catch (Execption $e) {
			return $this->makeHint(TGGF_HINT_INNER_ERROR);
		}
	}
	
	private function isOrderCommand($hint) {
		try {
			
			
			$ret = $this->_oCmdTable->getObject();
			
			
			//$ret = $this->_oCmdTable->getObject(array('cmd' => $hint));
			interface_log(INFO, EC_OK, "ret:" . $ret);
			if (empty($ret)) {
				interface_log(INFO, EC_OK, "empty ret");
				return false;
			} else {
				interface_log(INFO, EC_OK, "Not empty ret");
				return true;
			}
		} catch (Exception $e) {
			interface_log(ERROR, EC_DB_OP_EXCEPTION, $e->getMessage());
			return false;
		}
		
		return false;
	}
}
?>
