
localStorage.setItem("avg","");
localStorage.setItem("cate","");
var results = document.getElementById("results");
var searchResults = localStorage.getItem("searchResult");
results.innerHTML = searchResults;
results.innerHTML += "<a id='ref' href='index.html'>Back to homepage</a>";
var sortEle = document.getElementsByClassName('ref');
//console.log(sortEle);
var searchContent = localStorage.getItem("searchContent");
for(var i = 0;i < sortEle.length;i++){
	
	sortEle[i].onclick = function(){
	var cate = this.innerHTML + 'Cuisine';
	var avgg = localStorage.getItem("avg");
	localStorage.setItem("cate",cate);
//	alert(cate);
	var httpRequest = new XMLHttpRequest();
	httpRequest.open('POST','http://47.100.46.122:80/search.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/search.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send('cate='+cate+ '&search=' + searchContent+'&avg=' + avgg);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
    	 var result = httpRequest.responseText;
//  	 alert(result);
    	 results.innerHTML = result;
    	 results.innerHTML += "<a id='ref' href='index.html'>Back to homepage</a>";
    }
    };
	}
}
var avgEle = document.getElementsByClassName('avg');
for(var i = 0;i < avgEle.length;i++){
	avgEle[i].onclick = function(){
		var avg = this.id;
		localStorage.setItem("avg",avg);
		var catee = localStorage.getItem("cate");
		var httpRequestt = new XMLHttpRequest();
		httpRequestt.open('POST','http://47.100.46.122:80/search.php', true);
//	httpRequestt.open('POST','http://localhost:8848/InteProg-3/search.php', true);
    httpRequestt.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequestt.send('cate='+catee+ '&search=' + searchContent+'&avg=' + avg);
    httpRequestt.onreadystatechange = function () {
    if (httpRequestt.readyState == 4 && httpRequestt.status == 200) {
    	 var result = httpRequestt.responseText;
//  	 alert(result);
    	 results.innerHTML = result;
    	 results.innerHTML += "<a id='ref' href='index.html'>Back to homepage</a>";
    }
    };
	}
}

