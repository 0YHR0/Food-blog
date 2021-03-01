<?php
	//This php is used to get all the articles written by user itself
	$userId = $_POST["userId"];
    $conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    $sql = "SELECT * FROM articles where uid=".$userId;
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "<a class='a1'href='getSpecificArticle.php?id=".$row["id"]."'>". $row["title"]."</a>
        <button  class = 'delete' id = '".$row["id"]."'>delete</button>
        <button class = 'modify' id = '-".$row["id"]."'>modify</button><br>
        <br><br>";
    }
} else {
    echo "0 result";
}
$conn->close();
?>