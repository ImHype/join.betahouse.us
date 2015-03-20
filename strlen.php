<?php
	//获取中英文字符串长度函数
	function utf8_strlen($string = null){
		preg_match_all("/./us", $string, $match);	// 将字符串分解为单元
		return count($match[0]);					// 返回单元个数
	}	
?>