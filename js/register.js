/**
 *
 */
//alert('aa1');
var password1ele = document.getElementById("password");
var password2ele = document.getElementById("password2");
var userele = document.getElementById("username");
var registerDone = document.getElementById("registerDone");
// check username and password of registeration.
registerDone.onclick = function(){
	
	var password1 = password1ele.value;
	
	var reg = new RegExp(/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[~!@#$%^&*])[\da-zA-Z~!@#$%^&*]{8,}$/);
	if(!reg.test(password1)){
		toastr.warning('Password MUST contain digit,letter and symbols(~!@#$%^&*),length from 8-16');
		return;
	}
    var password2 = password2ele.value;
    var user = userele.value;
	if(password1 != password2){
		toastr.warning("The second input of password is not the same with the first one!");
	}
	else{
	var httpRequest = new XMLHttpRequest();
	httpRequest.open('POST','http://47.100.46.122:80/register.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/register.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send('user='+user + '&password=' + password1);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
    	 var result = httpRequest.responseText;
    	 if(result == 'success'){
    	 	toastr.success("register success!");
    	 	 setTimeout("window.open('login.html')",1000);
    	 }
    	 else{
    	 	alert(result);
    	 }
    }
    };
	//success
	}
}
var img = document.getElementById("img");
var input = document.getElementById("input");
//隐藏text block，显示password block
img. onclick = function (){
	if (password.type == "password") {
		password.type = "text";
		img.src = "img/eyeClose.png";
	}else {
		password.type = "password";
		img.src = "img/eyeOpen.png";
	}
}

