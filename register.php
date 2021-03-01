<?php
//echo "$_POST['user']";
//THis php is used to create a new user.
$conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
//   echo 111;
    
   
  $sql = "INSERT INTO users (id, username,password) VALUES (default, '".$_POST["user"]."','".$_POST["password"]."')";
    
$result=$conn->query($sql);
if ($result == TRUE) {
    echo "success";
} else {
    echo "UserName exists!";
}

?>