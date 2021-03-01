<?php
	//This php is used to search by the input keywords and sort the results by category and avg cost.
	$search = $_POST["search"];

//	echo "$search";
    $conn = new mysqli("localhost", 'root', '123456','blogweb');
    if ($conn->connect_error) {
       die("fail" . $conn->connect_error);
    }
    else{
//	   echo 'success';
    }
    if(isset($_POST['cate']) && isset($_POST['avg'])){
    	
    	//sort
    	$cate = $_POST['cate'];
    	$avg = $_POST['avg'];
    	if($cate!='' && $avg!=''){
    		if($avg=='100'){
    			$sql = "SELECT * FROM articles where title LIKE '%".$search."%' AND category='".$cate."' 
    UNION SELECT * FROM articles where content LIKE '%".$search."%' AND category='".$cate."' 
    UNION SELECT * FROM articles where category='".$cate."' 
    UNION SELECT * FROM articles where restaurant LIKE '%".$search."%' AND category='".$cate."' ORDER BY avg_cost DESC;";
    		}
    		else if($avg=='200'){
    		$sql = "SELECT * FROM articles where title LIKE '%".$search."%' AND category='".$cate."' 
    UNION SELECT * FROM articles where content LIKE '%".$search."%' AND category='".$cate."' 
    UNION SELECT * FROM articles where category='".$cate."' 
    UNION SELECT * FROM articles where restaurant LIKE '%".$search."%' AND category='".$cate."' ORDER BY avg_cost;";
    	}}
    	else if($avg=='' &&$cate!=''){
    	$sql = "SELECT * FROM articles where title LIKE '%".$search."%' AND category='".$cate."'
    UNION SELECT * FROM articles where content LIKE '%".$search."%' AND category='".$cate."'
    UNION SELECT * FROM articles where category='".$cate."'
    UNION SELECT * FROM articles where restaurant LIKE '%".$search."%' AND category='".$cate."';";
    }
    else if($avg!='' &&$cate==''){
    	if($avg =='200'){
    	$sql = "SELECT * FROM articles where title LIKE '%".$search."%'
    UNION SELECT * FROM articles where content LIKE '%".$search."%' 
    UNION SELECT * FROM articles where category LIKE '%".$search."%' 
    UNION SELECT * FROM articles where restaurant LIKE '%".$search."%' ORDER BY avg_cost;";
    }
       else if($avg =='100'){
       	$sql = "SELECT * FROM articles where title LIKE '%".$search."%'
    UNION SELECT * FROM articles where content LIKE '%".$search."%' 
    UNION SELECT * FROM articles where category LIKE '%".$search."%' 
    UNION SELECT * FROM articles where restaurant LIKE '%".$search."%' ORDER BY avg_cost DESC;";
       }
       }
    
    
    }
    else{//main page
    $sql = "SELECT * FROM articles where title LIKE '%".$search."%'
    UNION SELECT * FROM articles where content LIKE '%".$search."%' 
    UNION SELECT * FROM articles where category LIKE '%".$search."%' 
    UNION SELECT * FROM  articles where restaurant LIKE '%".$search."%';";}
//  echo "$sql";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // 输出数据
        echo "<label id='rNumber'>".$result->num_rows." results of ".$search."</label><br>";
    while($row = $result->fetch_assoc()) {
//  	$sql2 = "select * from user_star_articles where user_id"

        echo "<a href='searchSpecific.php?id=".$row["id"]."'>". $row["title"]."</a><br><br>";
    }

    
} else {
//	echo "$sql";
    echo "0 result";
}
$conn->close();

?>