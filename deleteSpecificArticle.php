<?php
	//This php is used to delete certain article totally.
	$id = $_POST["id"];
    $conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    
  $sql = "DELETE from articles where id='".$id."'";
    
//echo "111";
$result=$conn->query($sql);
if ($result == TRUE) {
    echo "success";
} else {
    echo "Error: ".$sql. $conn->error;
}

?>