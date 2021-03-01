<?php
	//THis php is used to get the detailed content of one article
$fav = isset($_GET["fav"]);
$id = $_GET["id"];
$conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    
  $sql = "select * from articles where id='".$id."'";
    
//echo "111";
$result=$conn->query($sql);
if ($result == TRUE) {
//  echo "success";
} else {
//  echo "Error: ".$sql. $conn->error;
}


if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$category = $row["category"];
	$avgCost = $row["avg_cost"];
	$rating = $row["rating"];
	$thumb = $row["thump_up_numbers"];
	$restaurant = $row["restaurant"];
	$content = $row["content"];
	$title = $row["title"];
	echo "<div id = 'article' style='background:lightpink;' >";
	echo "Title: <label style='color:cornflowerblue ; font-size:20px;'>$title</label><br>";
	echo "$content";
	echo "<br>";
	echo "Category: <p style='color:cornflowerblue; font-size:20px;'>$category</p><br>";
	echo "Average Cost: <p style='color:cornflowerblue; font-size:20px;'>$avgCost</p><br>";
	echo "Restaurant and its location: <p style='color:cornflowerblue; font-size:20px;'>$restaurant</p><br>";
	echo "Rating: <p style='color:cornflowerblue; font-size:20px;'>$rating</p>";
    echo "</div>";
 
    if($fav){
    echo "<button id='delete' style='font-size:15px;color:antiquewhite;text-align: center;border-radius: 20px;background:cornflowerblue;width:300px;height:50px;border:none;'>Remove from favourite list</button>";
//  echo <<<TEST
//  	<script type="text/javascript">alert('test');
//  		</script>
//TEST;
    echo <<<DEL
    	<script src="js/jquery-2.1.4.min.js"></script>
        <link href="toastr/build/toastr.min.css" rel="stylesheet"/>
        <script src="toastr/build/toastr.min.js"></script>
    	<script type="text/javascript">
    		var delbtn = document.getElementById('delete');
    		delbtn.onclick = function(){
    			if(!confirm('Are you sure to remove this article from your favourite list?')){
    				return;
    			}
    			var httpRequest = new XMLHttpRequest();
    			var userid = localStorage.getItem('userId');
    			httpRequest.open('POST','http://47.100.46.122:80/delete.php', true);
	
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send('userId='+userid+'&'+'articleId='+'$id');
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var result = httpRequest.responseText;
        if(result=='success'){
        	toastr.success("remove success!");
        	delbtn.style.display="none";
        }
    	}
    };
    		}
    	</script>
DEL;
	echo "<a style='color:dodgerblue;font-size:20px;'href='favoriteList.html'>Back to favorite list</a>";
}
    else{
    	echo "<button id='star'style='font-size:15px;color:antiquewhite;text-align: center;border-radius: 20px;background:cornflowerblue;width:130px;height:40px;border:none;'>Add to my favourite list!</button>";
    	echo "<button id='delete' style='font-size:15px;color:antiquewhite;text-align: center;border-radius: 20px;background:cornflowerblue;width:300px;height:50px;border:none;display:none;'>Remove from favourite list</button>";
    	    echo <<<STAR
    	    	<script src="js/jquery-2.1.4.min.js"></script>
                <link href="toastr/build/toastr.min.css" rel="stylesheet"/>
                <script src="toastr/build/toastr.min.js"></script>
    	<script type="text/javascript">
    		var starbtn = document.getElementById('star');
    	
    		var unstarbtn = document.getElementById('delete');
    		unstarbtn.onclick = function(){
    			var httpRequest = new XMLHttpRequest();
    			var userid = localStorage.getItem('userId');
    			httpRequest.open('POST','http://47.100.46.122:80/delete.php', true);
	
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send('userId='+userid+'&'+'articleId='+'$id');
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var result = httpRequest.responseText;
        if(result=='success'){
        	toastr.success("remove success!");
        	unstarbtn.style.display='none';
        	starbtn.style.display = '';
        }
    	}
    };
    		}
    		starbtn.onclick = function(){
    			
    			var httpRequest = new XMLHttpRequest();
    			var userId = localStorage.getItem('userId');
    			httpRequest.open('POST','http://47.100.46.122:80/star.php', true);
    httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    httpRequest.send('userId='+userId+'&'+'articleId='+'$id');
    httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var result = httpRequest.responseText;
        if(result=='success'){
        	toastr.success("add success!");
        	starbtn.style.display='none';
        	unstarbtn.style.display='';
        }
        else{
        	toastr.warning("Already added");
        }
    	}
    };
    		}
    		var useridd = localStorage.getItem('userId');
    		if(useridd=='0' || useridd==null){
    		    starbtn.onclick = function(){
    		        toastr.info("Please login first to add this article into your favourite list");
    		    }
    		}
    	</script>
STAR;
    	echo "<br><a style='color:dodgerblue;font-size:20px;' href = 'searchResult.html'>Back to the results</a>";}

}
else{
	echo "error";
}
?>