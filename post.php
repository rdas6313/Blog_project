<?php include_once 'view/header.php';?>
<?php
	$database_conn = new DB;
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];

	}else{
		header('location: 404.php');
	}
	$query		= "SELECT * FROM content_table WHERE id=$id";
	$statement  = $database_conn->query($query);
	$row 		= $statement->fetch();
	
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['title'];?></h2>
				<h4><?php echo date::convert($row['date']).', By <a href="Home/Search/1/'.$row['author'].'">'.$row['author'].'</a>';?></h4>
				<img src=<?php echo "post_image/".$row['img'];?> alt="MyImage"/>
				<?php echo $row['content'];?>
				<p></p>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
						$query 		= "SELECT id,img FROM content_table WHERE category=".$row['category']." AND id!=".$row['id'];
						$statement 	= $database_conn->query($query);
						if($statement->rowCount()>0){
							while($row = $statement->fetch()){
								echo '<a href="Home/Post/'.$row['id'].'"><img src="post_image/'.$row['img'].'" alt="post image"/></a>';
							}
						}else{
							echo '<b>No related Post Found</b>';
						}				
					?>
				</div>
			</div>
		</div>
	
		
<?php include_once 'view/sidebar.php';?>
<?php include_once 'view/footer.php';?>	

	