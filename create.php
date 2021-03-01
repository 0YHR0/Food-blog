<?php
	//get the content of the ueditor
$content = $_POST["content"];
$userId = $_POST["userId"];
$avgcost = $_POST["avgcost"];
$rating = $_POST["rating"];
$category = $_POST["category"];
$restaurant = $_POST["restaurant"];
$title = $_POST["title"];

header('Access-Control-Allow-Origin: *');
//set the connection of the mysql
$conn = new mysqli("localhost", 'root', '123456','blogweb');
if ($conn->connect_error) {
    die("fail" . $conn->connect_error);
}
else{
	//success to DB
//	echo 'success';
}
//
// store new created article into database.
$sql ="INSERT INTO articles (id,uid,category,avg_cost,rating,thump_up_numbers,restaurant,content,title) 
VALUES(default,'".$userId."','".$category."','".$avgcost."','".$rating."',0,'".$restaurant."','".$content."','".$title."')";
//echo "111";
$result=$conn->query($sql);
if ($result == TRUE) {
    echo "success";
} else {
    echo "Error: ".$sql. $conn->error;
}

//if ($result->num_rows > 0) {
//	echo 'success';
//}
   
$conn->close();

?>
