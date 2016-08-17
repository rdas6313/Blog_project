<?php include_once 'view/header.php';?>
<?php
	$per_page 	   = 4;
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$page 	   = $_GET['page'];
	}else{
		$page 	   = 1;
	}
	$start 		   = ($page*$per_page)-$per_page;
	$database_conn = new DB;
	$query 		   = "SELECT * FROM content_table ORDER BY id DESC LIMIT $start,$per_page";
	$statement 	   = $database_conn->query($query);
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
			if($statement->rowCount()>0){
					while($row = $statement->fetch()){
						echo '<div class="samepost clear">
							<h2><a href="post.php?id='.$row['id'].'">'.$row['title'].'</a></h2>
							<h4>'.date::convert($row['date']).', By <a href="#">'.$row['author'].'</a></h4>
							 <a href="post.php?id='.$row['id'].'"><img src="post_image/'.$row['img'].'" alt="post image"/></a>
							'.data_short::short($row['content'],250).'
							<div class="readmore clear">
								<a href="post.php?id='.$row['id'].'">Read More</a>
							</div>
						</div>';
				}
		//page_ination start
			$query 		= "SELECT * FROM content_table";
			$statement 	= $database_conn->query($query);
			$totalpost 	= $statement->rowCount();
			$totalpage  = ceil($totalpost/$per_page); 
			if($page-1 >= 1){
				echo '<a href="index.php?page='.($page-1).'" class="ml" id="left">Less</a>';
			}
			if($page+1 <= $totalpage){
				echo '<a href="index.php?page='.($page+1).'" class="ml" id="right">More</a>';
			}
			
		//page_ination end
		}else{
			echo '<span style="color:red;font-size:18px">No data to Show !</span>';
		}
		?>
		</div>
		
		<?php include 'view/sidebar.php';?>
	</div>
<?php include 'view/footer.php';?>