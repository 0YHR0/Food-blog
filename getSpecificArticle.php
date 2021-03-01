<?php
	//This php is used to search the detailed content of the article and echo the result to html.
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
	echo "<div id = 'article' style='background:lightpink;'>";
	echo "Title: <label style='font-size:20px; color:cornflowerblue;' class='content'>$title</label><br>";
	echo "$content";
	echo "<br>";
	echo "Category: <p class='content' style='font-size:20px; color:cornflowerblue;'>$category</p><br>";
	echo "Average Cost(€): <p class='content' style='font-size:20px; color:cornflowerblue;'>$avgCost</p><br>";
	
	echo "Restaurant and location: <p class='content' style='font-size:20px; color:cornflowerblue;'>$restaurant</p><br>";
	echo "Rating: <p class='content' style='font-size:20px; color:cornflowerblue;'>$rating</p>";
    echo "</div>";
    echo "<a id='self'href = 'selftemp.html' style='font-size:20px; color:cornflowerblue;'>Back to Self Articles</a>";

}
?>