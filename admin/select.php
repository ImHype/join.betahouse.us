<!DOCTYPE HTML>

<head>
	<title>β-house工作室2015招新</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.scrolly.min.js"></script>
	<script src="../js/skel.min.js"></script>
	<script src="../js/init.js"></script>
	<script src="../js/check.js"></script>
	<style type="text/css">
		#header{
			padding: 10px 0;
		}
		#footer{
			padding: 10px 0;
		}
	</style>
</head>
<style type="text/css">
</style>
<h2 id="header" class="align-center">betahouse报名招新后台管理页面</h2>
<?php
	header("Content-Type:text/html;charset=UTF-8");
	if($_POST["username"]=="admin"&&$_POST["password"]=="betahouse222"){
		require "../conn.php";
		$res = $db->query("SELECT * FROM record");
		echo "<table class='table '>";
		echo "<tr>"."<td>姓名</td>"."<td>学号</td>"."<td>手机号</td><td>个人介绍</td><td>有意思的事情</td><td>梦想</td></tr>";
		while ($obj = $res->fetch(PDO::FETCH_ASSOC)) {
			echo '<tr>';
			foreach ($obj as $key => $value) {
				if($key!='id'){
					echo '<td>'.$value.'</td>';
				}
			}
			echo '</tr>';
		}
		echo "</table>";
	}else{
		echo "请重新输入";
	}
?>
<h4 id="footer">@betahouse.us</h4>
</html>