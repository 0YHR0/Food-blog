<?php
	//This php is used to delete articles from the favourite list or not
	$userId = $_POST['userId'];
	$articleId = $_POST['articleId'];
	$conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    
  $sql1 = "DELETE from user_star_articles where user_id='".$userId."' and article_id='".$articleId."'";
    
//echo "111";
$result1=$conn->query($sql1);
if ($result1 == TRUE) {
    echo "success";
} else {
//  echo "Error: ".$sql. $conn->error;
}

?>