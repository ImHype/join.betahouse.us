//前端表单检查函数check
function check(f){
	var Rname=/^[\u4e00-\u9fa5]{2,4}$/;		//姓名RegExp
	var Rnumber=/^\d{8}$/;					//学号RegExp
	var Rphone=/^1\d{10}$|^[1-9]\d{5}$/;		//手机RegExp
	var message=$(".notice");
	//错误信息message
	if (!Rname.test(f.name.value)){
		console.log(f.name.value);
		for (var i = 0; i < message.length; i++){
			message[i].style.display="none";
		}
		message[0].style.display="block";
		message[0].style.color="red";
		f.name.focus();
		return false;
	}
	if (!Rnumber.test(f.number.value)){
		console.log(f.number.value);
		for (var i = 0; i < message.length; i++){
			message[i].style.display="none";
		}
		message[1].style.display="block";
		message[1].style.color="red";

		f.number.focus();
		return false;
	}
	if (!Rphone.test(f.phone.value)){
		console.log(f.phone.value);
		for (var i = 0; i < message.length; i++){
			message[i].style.display="none";
		}
		message[2].style.display="block";
		message[2].style.color="red";

		f.phone.focus();
		return false;
	}
	if (f.intro.value.length==0||f.intro.value.length>300){
		console.log(f.intro.value);
		for (var i = 0; i < message.length; i++){
			message[i].style.display="none";
		}
		message[3].style.display="block";
		message[3].style.color="red";

		f.intro.focus();
		return false;
	}
	if (f.ques1.value.length==0||f.ques1.value.length>300){
		console.log(f.ques1.value);
		for (var i = 0; i < message.length; i++){
			message[i].style.display="none";
		}
		message[4].style.display="block";
		message[4].style.color="red";

		f.ques1.focus();
		return false;
	}
	if (f.ques2.value.length==0||f.ques2.value.length>300){
		console.log(f.ques2.value);

		for (var i = 0; i < message.length; i++){
			message[i].style.display="none";
		}
		message[5].style.display="block";
		message[5].style.color="red";

		f.ques2.focus();
		return false;
	}
	return true;
}





