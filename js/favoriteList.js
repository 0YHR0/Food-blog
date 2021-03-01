
var userId = localStorage.getItem('userId');
var httpRequest = new XMLHttpRequest();
httpRequest.open('POST','http://47.100.46.122:80/favoriteList.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/favoriteList.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send("userId="+userId);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var result = httpRequest.responseText;
        var favdiv = document.getElementById('fav');
        favdiv.innerHTML = result;
        
        
    }
    };