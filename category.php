<?php include_once 'view/header.php';?>	
<?php
	if(isset($_GET['category']) && !empty($_GET['category'])){
		$cat = validation::valid($_GET['category']);
	}else{
		header('location: 404.php');
	}
	$database_conn	= new DB();
	$query			= "SELECT * FROM content_table WHERE category=$cat";
	$statement		= $database_conn->query($query);
	$per_page 		= 3;
    $totalrow		= $statement->rowCount();
	$totalpage		= ceil($totalrow/$per_page);
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page 		= $_GET['page'];
	}else{
		$page 		= 1;
	}
	$start 			= ($page-1)*$per_page;
	$query 			= "SELECT * FROM content_table WHERE category=$cat ORDER BY id DESC LIMIT $start,$per_page";
	$statement 		= $database_conn->query($query);
	$limit=200;
?>



<?php include 'view/slider.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php
			while($row = $statement->fetch()){
			echo '<div class="samepost clear">
				<h2><a href="Home/Post/'.$row['id'].'">'.$row['title'].'</a></h2>
				<h4>'.date::convert($row['date']).', By <a href="Home/Search/1/'.$row['author'].'">'.$row['author'].'</a></h4>
				 <a href="Home/Post/'.$row['id'].'"><img src="post_image/'.$row['img'].'" alt="post image"/></a>
				<p>
					'.data_short::short($row['content'],$limit).'
				</p>
				<div class="readmore clear">
					<a href="Home/Post/'.$row['id'].'">Read More</a>
				</div>
			</div>';
		}
		
			if($page-1>=1){
				echo '<a href="Home/Category/Page/'.($page-1).'/'.$cat.'" class="ml" id="left">Less</a>';
			}
			if($page+1<=$totalpage){
				echo '<a href="Home/Category/Page/'.($page+1).'/'.$cat.'" class="ml" id="right">More</a>';
			}
		?>
		</div>
		
		<?php include 'view/sidebar.php';?>
	</div>
<?php include 'view/footer.php';?>