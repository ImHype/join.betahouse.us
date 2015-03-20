<?php
	// 数据库配置
	$dbtype = 'mysql';		//数据库类型
	$dbhost = 'localhost';	//主机名
	$dbname = 'betahouse_join';	//数据库名
	$dbuser = 'root';			//数据库用户名
	$dbpassword = 'betahouse222';	//数据库密码

	// 数据库连接
	$db = new PDO("$dbtype:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword, array(PDO::ATTR_PERSISTENT=>TRUE));
	
	//设置使用UTF8字符集
	$db->query("set names UTF8");
?>
