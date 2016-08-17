<?php include 'view/header.php';?>
<?php
	if(isset($_GET['pageid']) && !empty($_GET['pageid'])){
		$pageid  = validation::valid($_GET['pageid']);
	}else{
		header('Location: index.php');
	}
	$database_conn = new DB;
	$query 		   = "SELECT * FROM page_table WHERE id=$pageid";
	$statement 	   = $database_conn->query($query);
?>
	<div class="contentsection contemplete clear">
	<?php
		if($statement->rowCount()>0){
			$row = $statement->fetch();
	?>
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['title'];?></h2>
					<?php echo $row['content'];?>
				</div>
	<?php
		}else{
			echo '<span style="color:red;font-size:18px">Unable To show!</span>';
		}
	?>
		</div>

<?php include 'view/sidebar.php';?>
<?php include 'view/footer.php';?>