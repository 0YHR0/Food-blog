//alert("aaaa");
var di = document.getElementById("self");
var p = localStorage.getItem("self");
di.innerHTML = p;
di.innerHTML += "<a href='index.html'>Homepage</a>";
var deletes = document.getElementsByClassName("delete");
//console.log(deletes[2].getAttribute("id"));
var modify = document.getElementsByClassName("modify");
for(var i = 0; i < modify.length;i++){
	modify[i].onclick = function(){
	var articleIdF = this.getAttribute("id");
	var articleIdM = -articleIdF;
	localStorage.setItem("ArticleID",articleIdM);
	var httpRequestM = new XMLHttpRequest();
	httpRequestM.open('POST','http://47.100.46.122:80/modifySpecificArticle.php', true);
//	httpRequestM.open('POST','http://localhost:8848/InteProg-3/modifySpecificArticle.php', true);
    httpRequestM.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequestM.send('id='+articleIdM);
    httpRequestM.onreadystatechange = function () {
    if (httpRequestM.readyState == 4 && httpRequestM.status == 200) {
    	 var resultM = httpRequestM.responseText;
//  	 alert('resultM' + resultM);
    	 localStorage.setItem("modify",resultM);
    	 window.open("modifySpecificArticle.html");
    	}
    };
	
	
	
	
	}
	}
for(var i = 0; i < deletes.length;i++){
	deletes[i].onclick = function(){
	if (confirm('Are you sure to delete? ')==true) {
      
	var articleId = this.getAttribute("id");
	var httpRequest = new XMLHttpRequest();
	httpRequest.open('POST','http://47.100.46.122:80/deleteSpecificArticle.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/deleteSpecificArticle.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send('id='+articleId);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
    	 var result = httpRequest.responseText;
    	 if(result=="success"){
    	 	toastr.success("success");
    	 	//refresh the page
    	 	var userId = localStorage.getItem("userId");
    var httpRequestnew = new XMLHttpRequest();
    httpRequestnew.open('POST','http://47.100.46.122:80/selfArticle.php', true);
//	httpRequestnew.open('POST','http://localhost:8848/InteProg-3/selfArticle.php', true);
    httpRequestnew.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequestnew.send("userId=" + userId);
    httpRequestnew.onreadystatechange = function () {
    if (httpRequestnew.readyState == 4 && httpRequestnew.status == 200) {
        var p = httpRequestnew.responseText;
        localStorage.setItem("self",p);
        location.reload();

//     w.print();
//      articlesdiv.innerHTML = result;
       }
    };
    	 }
    	 else{
    	 	toastr.warning("fail");
    	 }
    }
    };
   }
	};
}
