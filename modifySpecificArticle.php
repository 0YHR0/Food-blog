<?php
	//This php is used to return the previous content of the article
$id = $_POST["id"];
$conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    
  $sql = "select * from articles where id='".$id."'";
//echo "$id";
    
//echo "111";
$result=$conn->query($sql);
if ($result == TRUE) {
//  echo "success";
} else {
//  echo "Error: ".$sql. $conn->error;
}
//echo "$result->num_rows";
if ($result->num_rows > 0) {
//	echo '111';
	$row = $result->fetch_assoc();
	$category = $row["category"];
	$avgCost = $row["avg_cost"];
	$rating = $row["rating"];
	$thumb = $row["thump_up_numbers"];
	$restaurant = $row["restaurant"];
	$content = $row["content"];
	$title = $row["title"];
	
//	echo '111';
	echo <<<MOD
		<div id="title">
		<h2>Title:</h2><input id="titleSpace" type = "textarea" value="$title"/>
	</div>
		<br><div id = 'content'>
			$content
		</div>
		<br><div id = 'restaurantdiv'>
	<h2>Please input the restaurant and the location:</h2><input id='restaurant' type="text" value="$restaurant" style="size=128;"/>
</div>
		<br><div id = 'categorydiv'>
<h2>Please choose the category:<h2><select id = 'category'>
  <option value ="ChineseCuisine">ChineseCuisine</option>
  <option value ="JapaneseCuisine">JapaneseCuisine</option>
  <option value="EuropeanCuisine">EuropeanCuisine</option>
  <option value="KoreanCuisine">KoreanCuisine</option>
  <option value="SoutheastAsiaCuisine">SoutheastAsiaCuisine</option>
  <option value="CantoneseCuisine">CantoneseCuisine</option>
</select>
</div>
<div id='ca'>
<script type="text/javascript">
	var all_options = document.getElementById("category").options;
    for (var i=0; i<all_options.length; i++){
    if (all_options[i].value == "$category") 
    {
    	
    all_options[i].selected = true;
    }
    }
</script>
</div>
<br><div id='costdiv'>
	
		<h2>Input average cost per person:</h2><input id = 'avgcost' type="number"  value="$avgCost" min="1" max="999999"/>
	
</div>



<br><div id = 'rate'>
	<h2>Please rate the restaurant:</h2>
<select id = 'rating'>
  <option value ="1">1</option>
  <option value ="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
</div><br>
<div id='ra'>
<script type="text/javascript">
	var all_optionss = document.getElementById("rating").options;
    for (var j=0; j<all_optionss.length; j++){
    if (all_optionss[j].value == $rating) 
    {
    all_optionss[j].selected = true;
    }
    }
</script>
</div>



MOD;
	
	
	
	
//	echo "<div id = 'article'>";
//	echo "Title: <textarea>$title</textarea><br>";
//	echo "$content";
//	echo "<br>";
//	echo "Category: <p>$category</p><br>";
//	echo "Average Cost: <p>$avgCost</p><br>";
//	echo "thumb up: <p>$thumb</p><br>";
//	echo "location: <p>$location</p><br>";
//	echo "rating: <p>$rating</p>";
//  echo "</div>";
//  echo "<a href = 'selftemp.html'>Self Articles</a>";

}
?>