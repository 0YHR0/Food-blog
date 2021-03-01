<?php
	//this php is used to add the article into favourite list.
	$userId = $_POST['userId'];
	$articleId = $_POST['articleId'];
	$conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    
  $sql1 = "INSERT INTO user_star_articles (user_id,article_id) VALUES('".$userId."','".$articleId."')";
//echo "111";
$result1=$conn->query($sql1);
if ($result1 == TRUE) {
    echo "success";
} else {
    echo "Error: ".$sql1. $conn->error;
}

?>