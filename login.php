<?php
	//This php is used to check the log in info.
	$username = $_POST['username'];
	$password = $_POST['password'];
	//set the connection of the mysql
    $conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
//   echo 111;
    
   
  $sql = "select password from users where username='".$_POST["username"]."'";
    
//echo "111";
$result=$conn->query($sql);
if ($result == TRUE) {
//  echo "success";
} else {
    echo "Error: ".$sql. $conn->error;
}

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	if($row["password"]==$password){
		
		echo 'success';
	}
	else{
		echo 'username or password wrong';
	}
}
else{
	echo 'username or password wrong';
	
}

   
$conn->close();

?>