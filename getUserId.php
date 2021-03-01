<?php
	//This php is used to get the user id by username. because user id is used to store in table:articles.
$conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
//   echo 111;
    
   
  $sql = "select id from users where username='".$_POST["username"]."'";
    
//echo "111";
$result=$conn->query($sql);
if ($result == TRUE) {
//  echo "success";
} else {
//  echo "Error: ".$sql. $conn->error;
}

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$uid = $row["id"];
	echo "$uid";
}
?>