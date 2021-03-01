var modifyDiv = document.getElementById("modifydiv");
var article = localStorage.getItem("modify");
//console.log(article);
modifyDiv.innerHTML = article;
var content = document.getElementById("content");
var html = content.innerHTML;
//
var editor = document.getElementById('editor');
var ue = UE.getEditor('editor');
//console.log(ue);
ue.addListener("ready", function () { 
    ue.setContent(html); 
        });
content.parentNode.removeChild(content);
var save = document.getElementById('confirm');
//when clicking save, check if all the data have been input
save.onclick = function(){
	//articleID
	var articleID = localStorage.getItem("ArticleID");
	var article = "articleID="+articleID;
	
	var cate = document.getElementById('category');
    var index = cate.selectedIndex; // 选中索引
    var categoryText = cate.options[index].text; // 选中文本
    var category = 'category=' + categoryText;
//  console.log(category);
    var avg = document.getElementById('avgcost');
    var cost = avg.value;
    if(cost==''){
    	toastr.warning('Please input the average cost!');
    	return;
    }
    var avgcost = 'avgcost=' + cost;
//  console.log(avgcost);
	//rating
    var rate = document.getElementById('rating');
    var indexr = rate.selectedIndex; // 选中索引
    var rateText = rate.options[indexr].text; // 选中文本
    var rating = 'rating=' + rateText;	
	//restaurant
	var restaurantin = document.getElementById('restaurant');
    var restaurant = restaurantin.value; 
    if(restaurant==''){
    	toastr.warning('Please input the restaurant and location!');
    	return;
    }
    var restaurantstr = 'restaurant=' + restaurant;	
    //title
    var t = document.getElementById("titleSpace").value;
    if(t==''){
    	toastr.warning('Please input the title!');
    	return;
    }
    var title = 'title=' + t;
	
	var str = ue.getContent();
	if(str==''){
    	toastr.warning('Please input the content!');
    	return;
    }
	str = 'content='+str;
	var username = 'username='+localStorage.getItem("username");
	var userId = 'userId='+localStorage.getItem("userId");
	var packet = str + '&' + userId + '&' + category + '&' + avgcost + '&' + rating + '&' + restaurantstr+ '&' + title + '&' + article;
    console.log(packet);
	
	
	
	
	var httpRequest = new XMLHttpRequest();
	httpRequest.open('POST','http://47.100.46.122:80/saveModify.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/saveModify.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send(packet);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
    	 var result = httpRequest.responseText;
    	 if(result == 'success'){
        	if (confirm('Save success! Do you want to back your self Article? ')==true) {
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
        window.open("selftemp.html");

//     w.print();
//      articlesdiv.innerHTML = result;
       }
    };
      }  	
        }

    	}
    };
}



//cate
var caScript = document.getElementById("ca").getElementsByTagName("SCRIPT").item(0);
var newcaScript = document.createElement("SCRIPT");
newcaScript.innerHTML = caScript.innerHTML;
document.getElementsByTagName("body").item(0).appendChild(newcaScript);
//ra
var raScript = document.getElementById("ra").getElementsByTagName("SCRIPT").item(0);
var newraScript = document.createElement("SCRIPT");
newraScript.innerHTML = raScript.innerHTML;
document.getElementsByTagName("body").item(0).appendChild(newraScript);

var deletebtn = document.getElementById('delete');
//delete button to delete the whole article
deletebtn.onclick = function(){
	if (confirm('Are you sure to delete? ')==true) {
      
	var articleID = localStorage.getItem("ArticleID");
	var httpRequest = new XMLHttpRequest();
	httpRequest.open('POST','http://47.100.46.122:80/deleteSpecificArticle.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/deleteSpecificArticle.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send('id='+articleID);
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
    	 var result = httpRequest.responseText;
    	 if(result=="success"){
    	 	toastr.warning("success");
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
       setTimeout("window.open('selftemp.html')",1000);;

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
}
