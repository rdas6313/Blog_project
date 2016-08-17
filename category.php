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



<div class="slidersection templete clear">
        <div id="slider">
            <a href="#"><img src="images/slideshow/01.jpg" alt="nature 1" title="This is slider one Title or Description" /></a>
            <a href="#"><img src="images/slideshow/02.jpg" alt="nature 2" title="This is slider Two Title or Description" /></a>
            <a href="#"><img src="images/slideshow/03.jpg" alt="nature 3" title="This is slider three Title or Description" /></a>
            <a href="#"><img src="images/slideshow/04.jpg" alt="nature 4" title="This is slider four Title or Description" /></a>
        </div>

</div>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php
			while($row = $statement->fetch()){
			echo '<div class="samepost clear">
				<h2><a href="post.php?id='.$row['id'].'">'.$row['title'].'</a></h2>
				<h4>'.date::convert($row['date']).', By <a href="#">'.$row['author'].'</a></h4>
				 <a href="post.php?id='.$row['id'].'"><img src="post_image/'.$row['img'].'" alt="post image"/></a>
				<p>
					'.data_short::short($row['content'],$limit).'
				</p>
				<div class="readmore clear">
					<a href="post.php?id='.$row['id'].'">Read More</a>
				</div>
			</div>';
		}
		
			if($page-1>=1){
				echo '<a href="category.php?page='.($page-1).'&category='.$cat.'" class="ml" id="left">Less</a>';
			}
			if($page+1<=$totalpage){
				echo '<a href="category.php?page='.($page+1).'&category='.$cat.'" class="ml" id="right">More</a>';
			}
		?>
		</div>
		
		<?php include 'view/sidebar.php';?>
	</div>
<?php include 'view/footer.php';?>