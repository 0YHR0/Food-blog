
var self = document.getElementById("selfArticle");
var logout = document.getElementById("logout");
//send userId to php to open the window to see all the articles written by itself.
self.onclick = function(){
	var articlesdiv = document.getElementById("main");
    var userId = localStorage.getItem("userId");
    var httpRequest = new XMLHttpRequest();
    httpRequest.open('POST','http://47.100.46.122:80/selfArticle.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/selfArticle.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send("userId=" + userId);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var p = httpRequest.responseText;
        localStorage.setItem("self",p);
        window.open('selftemp.html');



       }
    };
        
}

var searchPlace = document.getElementById("search");

//send search content and userId to php 
var search = document.getElementById("searchDone");
search.onclick = function (){
    var useridd = localStorage.getItem("userId");
	var searchContent = searchPlace.value;
	var httpRequests = new XMLHttpRequest();
	httpRequests.open('POST','http://47.100.46.122:80/search.php', true);
//	httpRequests.open('POST','http://localhost:8848/InteProg-3/search.php', true);
    httpRequests.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequests.send("search="+ searchContent+"&userId="+useridd);
//  alert(searchContent);
    httpRequests.onreadystatechange = function () {
    if (httpRequests.readyState == 4 && httpRequests.status == 200) {
        var results = httpRequests.responseText;
        localStorage.setItem("searchContent",searchContent);
        localStorage.setItem("searchResult",results);
        window.open('searchResult.html');
        //.........................................
}
    };
}

var logInAlready = document.getElementById("logInAlready");
var logInNot = document.getElementById("logInImg");
var userId=localStorage.getItem("userId");
var newArticle= document.getElementById("newArticle");
//console.log(userId);
//check if the user already log in or not.
if(userId=="0"){
	logInNot.style.display="";
	logInAlready.style.display="none";
}
else if(userId!=null){
	logInNot.style.display="none";
	logInAlready.style.display="";
}
window.onscroll = function(){
	 newArticle.style.top=document.body.scrollTop+(document.body.clientHeight-newArticle.offsetHeight)/2
	newArticle.style.left=document.body.scrollLeft+(document.body.clientWidth-newArticle.offsetWidth)/2;
}
newArticle.onclick= function(){
	if(userId=="0"||userId==null){
		alert("Please log in first");
	}
	else{
	window.open("createArticle.html");
	}
}
logout.onclick = function(){
	 localStorage.setItem("username","0");
	 localStorage.setItem("userId", "0");
	 location.reload();

}
