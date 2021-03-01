//alert('category');
//This is used to check the create the create article.html
if(localStorage.getItem("userId")==null){
	alert("Please login first");
	window.open("login.html");
}


var ue = UE.getEditor('editor');
var btn = document.getElementById('sub');


var save = function(){
	
	//get detail of the article
    var cate = document.getElementById('category');
    var index = cate.selectedIndex; 
    var categoryText = cate.options[index].text; 
    var category = 'category=' + categoryText;
//  console.log(category);
    var avg = document.getElementById('avgcost');
    var cost = avg.value;
    if(cost==''){
    	toastr.warning("Please input the average cost! ");
    	return;
    }
    var avgcost = 'avgcost=' + cost;
//  console.log(avgcost);
	//rating
    var rate = document.getElementById('rating');
    var indexr = rate.selectedIndex; 
    var rateText = rate.options[indexr].text;
    var rating = 'rating=' + rateText;	
	//restaurant
	var restaurantin = document.getElementById('restaurant');
    var restaurant = restaurantin.value; 
    if(restaurant==''){
    	toastr.warning("Please input the restaurant and the location!");
    	return;
    }
    var restaurantstr = 'restaurant=' + restaurant;	
    //title
    var t = document.getElementById("titleSpace").value;
    if(t==''){
    	toastr.warning("Please input the title!");
    	return;
    }
    var title = 'title=' + t;
	
	var str = ue.getContent();
	if(str==''){
		toastr.warning("Please input the content!");
		return;
	}
	str = 'content='+str;
	var username = 'username='+localStorage.getItem("username");
	var userId = 'userId='+localStorage.getItem("userId");
	//get the userid
//	var httpRequestid = new XMLHttpRequest();
//	httpRequestid.open('POST','http://localhost:8848/InteProg-3/getUserId.php', true);
//  httpRequestid.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//  httpRequestid.send(username);
//  httpRequestid.onreadystatechange = function () {
//  if (httpRequestid.readyState == 4 && httpRequestid.status == 200) {
//      var resultId = httpRequestid.responseText;
//      userId = userId + resultId;
//  }
//  };
    var packet = str + '&' + userId + '&' + category + '&' + avgcost + '&' + rating + '&' + restaurantstr+ '&' + title;
    console.log(packet);

	//send the content
	var httpRequest = new XMLHttpRequest();
	httpRequest.open('POST','http://47.100.46.122:80/create.php', true);
//	httpRequest.open('POST','http://localhost:8848/InteProg-3/create.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//   console.log('111');
    httpRequest.send(packet);
   
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var result = httpRequest.responseText;
        console.log(result);
        if(result == 'success'){
        	toastr.success('save success!');
        	 setTimeout("window.open('index.html')",1000);
        }
//      console.log(result);
    }
};

}

btn.onclick = function(){
	save();
//	alert("submit successful!");
//	window.open("selfArticle.html");
//	ue.setHide();
}

