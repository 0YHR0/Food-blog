<?php
	//This php is used to save the modified article
	//get the content of the ueditor
$content = $_POST["content"];
$userId = $_POST["userId"];
$avgcost = $_POST["avgcost"];
$rating = $_POST["rating"];
$category = $_POST["category"];
$restaurant = $_POST["restaurant"];
$title = $_POST["title"];
$articleID = $_POST["articleID"];
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
//$sql = "INSERT INTO users (id, username, password, photo) VALUES (default,'".$_POST["name"]."','123123','777')";
$sql1 ="INSERT INTO articles (id,uid,category,avg_cost,rating,thump_up_numbers,restaurant,content,title) 
VALUES(default,'".$userId."','".$category."','".$avgcost."','".$rating."',0,'".$restaurant."','".$content."','".$title."')";
//echo "111";
$sql2 ="DELETE from articles where id='".$articleID."'";
$result1=$conn->query($sql1);
$result2=$conn->query($sql2);
if ($result1 && $result2 == TRUE) {
    echo "success";
} else {
    echo "Error: ".$sql. $conn->error;
}

//if ($result->num_rows > 0) {
//	echo 'success';
//}
   
$conn->close();

?>