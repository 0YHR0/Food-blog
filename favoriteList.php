<?php
	//This php is used to search favourite articles of the user and return its title as a hyperlink
	//and the id of articles by the id of the hyperlink
	$userId = $_POST["userId"];
	$conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    
  $sql1 = "select * from user_star_articles where user_id='".$userId."'";
    
//echo "111";
$result1=$conn->query($sql1);
if ($result1 == TRUE) {
//  echo "success";
} else {
//  echo "Error: ".$sql. $conn->error;
}
  echo "<label id='label'> Your favourite articles are: </label><br><br>";
  if($result1->num_rows==0){
  	echo"<label id='label2'>No articles in your favorite list found</label>";

  }
  else{
for($i = 0;$i < $result1->num_rows;$i++){
	$artIdrow = $result1->fetch_assoc();
	$article_id = $artIdrow["article_id"];
	$sql2 = "select * from articles where id='".$article_id."'";
	//second sql query
	$result2=$conn->query($sql2);
if ($result2 == TRUE) {
//  echo "success";
} else {
//  echo "Error: ".$sql. $conn->error;
}
if ($result2->num_rows > 0) {
    // 输出数据
      
    while($row = $result2->fetch_assoc()) {

        echo "<a href='searchSpecific.php?fav=a&id=".$row["id"]."'>". $row["title"]."</a><br><br>";
    }

    
}
	
	
}}

    

?>