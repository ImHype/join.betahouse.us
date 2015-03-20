<?php
	// 数据检查函数check
	function check($name,$number,$phone,$intro,$ques1,$ques2){
		$regName="/^[\x{4e00}-\x{9fa5}]{2,4}$/u";		//姓名RegExp
		$regNumber="/^\d{8}$/";					//学号RegExp
		$regPhone="/^1\d{10}$|^[1-9]\d{5}$/";			//手机RegExp
		$message="请正常提交，2秒钟后转到报名页面...<meta http-equiv='refresh' content='2;url=./'>";	
		//错误反馈信息
		$verifi="";
		$data = array();							//待插入数据
		if (!preg_match($regName,$name)){
			return $message;
		}
		if (!preg_match($regNumber,$number)){
			return $message;
		}
		require "verifi.php";
		switch(verifi($name,$number)){
			case 0:
				return "学号姓名不匹配!两秒后返回..<script>setTimeout('window.history.go(-1)',2000);</script>";
				break;
			case 1:
				break;
			case 2:
				return "仅限信工学生报名!两秒后返回..<script>setTimeout('window.history.go(-1)',2000);</script>";
				break;
			case 3:
				return "仅限大一大二!两秒后返回..<script>setTimeout('window.history.go(-1)',2000);</script>";
				break;
		}
		if (!preg_match($regPhone,$phone)){
			return $message;
		}
		require "strlen.php";						//字符串长度获取函数
		if (utf8_strlen($intro)==0||utf8_strlen($intro)>300){
			return $message;
		}
		if (utf8_strlen($ques1)==0||utf8_strlen($ques1)>300){
			return $message;
		}
		if (utf8_strlen($ques2)==0||utf8_strlen($ques2)>300){
			return $message;
		}
		else{
			$intro=filter($intro);
			$ques1=filter($ques1);
			$ques2=filter($ques2);
			$key = array("name","number","phone","intro","ques1","ques2");
			$value = array($name,$number,$phone,$intro,$ques1,$ques2);
			$data = array($key, $value);
			return $data;
		}
	}

	//安全过滤函数
	function filter($str){
		//检测魔术引号是否开启
		if (!get_magic_quotes_gpc()){
			$str=addslashes($str);			//转义字符 " ' \ 
		}
		$str = str_replace("_", "\_", $str); 	//转义字符 _
    		$str = str_replace("%", "\%", $str); 	//转义字符 %
    		$str = nl2br($str);					//换行处插入<br>
		return $str;
	}

	//数据还原显示函数
	function strRecover($str){
		$str = str_replace('\"', '"', $str);		
		$str = str_replace("\'", "'", $str);					//去除addslashes转义的字符\
		$str = str_replace("\_", "_", $str); 				//转义字符 _
    		$str = str_replace("\%", "%", $str); 				//转义字符 %
    		$str = htmlspecialchars($str);					//html实体
    		$str = str_replace("&lt;br /&gt;", "<br>", $str); 	//转义字符 %
    		return $str;
	}

	//文件检查上传函数
	function upload($file){
		if ($file['error']==0&&$file["name"]!=""){
			if ($file["type"]!=="application/zip") {
				return "请上传zip文件!";
			}
			if ($_FILES["work"]["size"]>=10485760){
				return "文件请小于10M!";
			}
			$rename="upload/".$file["name"];			//重新定义文件路径及文件名10485760
			while (file_exists($rename)) {
				$temp=explode(".", $rename);//分割字符串，分离文件名与文件后缀格式
				$rename=$temp[0]."0".".".$temp[1];//文件名后加0
			}
			if (move_uploaded_file($file["tmp_name"], $rename)) {
				return "文件已上传！";
			}
			else{
				return "文件上传失败！";
			}
		}
		else{
			return "";
		}
	}
?>	