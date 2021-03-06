<?php
namespace Boot;
use \ErrorException;
defined('MEDZ') or exit('Forbidden');
class Error extends ErrorException {
	
	// #发送错误消息
	public static function exception($e) {
		self::halt($e);
	}

	// # 致命错误异常处理
	public static function fatalError() {
		if(($e = error_get_last())) {
			var_dump($e);
		}
	}

	// # 自定义错误
	public static function errorHandler() {
		var_dump(func_get_args());
	}

	// # 抛出异常
	public static function thrown($message, $code = 1) {
		throw new self($message, $code);
	}

	// # 输出异常，并终止运行
	public static function halt($e) {
		if (isset($e->xdebug_message)) {
			echo '<table class="xdebug-error xe-parse-error" dir="ltr" border="1" cellspacing="0" cellpadding="1">',
				 $e->xdebug_message,
				 '</table>';
		}
		// exit;
		// var_dump($e);
	}

}