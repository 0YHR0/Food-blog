var img = document.getElementById("img");

 var input = document.getElementById("input");
    
//show or not show password
img.onclick = function (){
  if (input.type == "password") {
   input.type = "text";
   img.src = "img/eyeClose.png";
  }else {
   input.type = "password";
   img.src = "img/eyeOpen.png";
  }
 }
//confirm 
var username = document.getElementById("username");
var password = document.getElementById('input');
var confirm = document.getElementById("submit");
//send the username and password to php
confirm.onclick = function(){

	//send to the server
	var user = 'username=' + username.value;
	var passwd = 'password=' + password.value;
	var httpRequest = new XMLHttpRequest();
	httpRequest.open('POST','http://47.100.46.122:80/login.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/login.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send(user + '&' + passwd);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var result = httpRequest.responseText;
       toastr.info(result);

       //success
       if(result=='success'){
       	localStorage.setItem("username", username.value);
       	//set userId
       	var httpRequestid = new XMLHttpRequest();
       	httpRequestid.open('POST','http://47.100.46.122:80/getUserId.php', true);
//	     httpRequestid.open('POST','http://localhost:8848/InteProg-3/getUserId.php', true);
         httpRequestid.setRequestHeader("Content-type","application/x-www-form-urlencoded");
         httpRequestid.send(user);
          httpRequestid.onreadystatechange = function () {
        if (httpRequestid.readyState == 4 && httpRequestid.status == 200) {
        var resultid = httpRequestid.responseText;
        localStorage.setItem("userId", resultid);
               setTimeout("window.open('index.html')",1000);

        }
       	};
       	
       	
       	
       	

       }
//     else if(result=='userName not exist'){
//     	
//     	window.open("register.html");
//     }
    }
};
//	console.log(username.value);
}
