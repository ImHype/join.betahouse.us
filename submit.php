<?php
	// 报名表单处理页
	header("Content-type: text/html; charset=utf-8"); //页面编码
	if (isset($_POST['name'])){
		require "filter.php";  //引入数据检查函数check
		$result=check($_POST['name'],$_POST['number'],$_POST['phone'],$_POST['intro'],$_POST['ques1'],$_POST['ques2']);
		if (is_string($result)){
			echo $result;
		}
		if (is_array($result)){
			require "conn.php"; 	//数据库连接文件
			$key=$result[0];		//字段数组
			$value=$result[1];	//数据数组
			session_start();		//开启session
			if(isset($_SESSION['number']) && $_SESSION['number']==$value[1]){
				$edit = $db->exec("UPDATE record SET `$key[0]`='$value[0]',`$key[2]`='$value[2]',`$key[3]`='$value[3]',`$key[4]`='$value[4]',`$key[5]`='$value[5]' WHERE `$key[1]`='$value[1]'");
				echo "<!DOCTYPE html>
					<html>
					<head>
						<meta charset='UTF-8'>
						<title>β-house工作室2015招新</title>
						<link rel='stylesheet' href='http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css'>
					</head>
					<body>
					<div style=' margin-top:20px;' class='col-md-10 col-md-offset-1'>";
				echo "<h4>欢迎您,".upload($_FILES['work'])."请确认修改信息</h4>";	//文件上传
				if ($edit){
					//echo "<br>请确认修改信息——<br>姓名: $value[0] 学号: $value[1] 手机: $value[2]<br><br>个人简介:<br>".strRecover($value[3])."<br><br>问题一:<br>".strRecover($value[4])."<br><br>问题二:<br>".strRecover($value[5])."<br>";
					//echo "<br>如有错误请点此<a href='javascript:window.history.go(-1)'>修改<a>,并在两小时内完成提交";
					echo "
						<table class='table'>
					  		<tr>
								<td >姓名</td>
								<td >学号</td>
								<td >手机</td>
							</tr>
							<tr>
								<td class='info'>$value[0]</td>
								<td class='info'>$value[1]</td>
								<td class='info'>$value[2]</td>
							</tr>
					  	</table>

					    <div class='row'>
							<div class='col-md-12'>
							     <h4>个人简介</h4>
							     <p>".strRecover($value[3])."</p>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
							     <h4>问题一</h4>
							     <p>".strRecover($value[4])."</p>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
							     <h4>问题二</h4>
							     <p>".strRecover($value[5])."</p>
							</div>
						</div>
					";				
					echo "<h4>如有错误请点此<a href='javascript:window.history.go(-1)'>修改</a>,并在两小时内完成提交</h4>";
					echo "<h4>如果确认无误请加群：362897818</h4>";
					echo "<br/><br/><br/><br/><p>&copy; β-house工作室2015招新</p></div></body></html>";
				}
				else{
					echo "<br>报名信息未修改!两秒后返回..<script>setTimeout('window.history.go(-1)',2500);</script>";
					echo "<br/><br/><br/><br/><p>&copy; β-house工作室2015招新</p></div></body></html>";
				}
			}
			else{
				$sign = $db->exec("INSERT INTO record SET `$key[0]`='$value[0]',`$key[1]`='$value[1]',`$key[2]`='$value[2]',`$key[3]`='$value[3]',`$key[4]`='$value[4]',`$key[5]`='$value[5]'");
				echo "<!DOCTYPE html>
					<html>
					<head>
						<meta charset='UTF-8'>
						<title>β-house工作室2015招新</title>
						<link rel='stylesheet' href='http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css'>
					</head>
					<body>
					<div style=' margin-top:20px;' class='col-md-10 col-md-offset-1'>";
				echo "<h4>欢迎您,".upload($_FILES['work'])."请确认报名信息</h4>";	//文件上传
				if ($sign){
					setcookie(session_name(),session_id(),time()+7200);
					$_SESSION['number']=$value[1];				//学号
					// echo "<br>请确认报名信息——<br>姓名: $value[0] 学号: $value[1] 手机: $value[2]<br><br>个人简介:<br>".strRecover($value[3])."<br><br>问题一:<br>".strRecover($value[4])."<br><br>问题二:<br>".strRecover($value[5])."<br>";
					echo "
						<table class='table'>
					  		<tr>
								<td >姓名</td>
								<td >学号</td>
								<td >手机</td>
							</tr>
							<tr>
								<td class='info'>$value[0]</td>
								<td class='info'>$value[1]</td>
								<td class='info'>$value[2]</td>
							</tr>
					  	</table>

					    <div class='row'>
							<div class='col-md-12'>
							     <h4>个人简介</h4>
							     <p>".strRecover($value[3])."</p>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
							     <h4>问题一</h4>
							     <p>".strRecover($value[4])."</p>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
							     <h4>问题二</h4>
							     <p>".strRecover($value[5])."</p>
							</div>
						</div>
					";				
					echo "<h4>如有错误请点此<a href='javascript:window.history.go(-1)'>修改</a>,并在两小时内完成提交</h4>";
					echo "<h4>如果确认无误请加群：362897818</h4>";
					echo "<br/><br/><br/><br/><p>&copy; β-house工作室2015招新</p></div></body></html>";
				}
				else{
					echo "<br>报名失败!两秒后返回..<script>setTimeout('window.history.go(-1)',2500);</script>";
					echo "<br/><br/><br/><br/><p>&copy; β-house工作室2015招新</p></div></body></html>";
				}
			}
		}
	}
	else{
		header("Location:./");
	}
?>
