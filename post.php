
<?php include_once 'config/db_connection.php';?>
<?php include_once 'config/date.php';?>	
<?php include_once 'config/data_short.php';?>

<?php include_once 'view/header.php';?>
<?php
	$db=new DB();
	if(isset($_GET['id']) ){
		$id=$_GET['id'];
	}else{
		header('location: 404.php');
	}
	
	$q="SELECT * FROM content_table WHERE id=".$id;
	$s=$db->query($q);
	$row=$s->fetch();
	$d=new date;
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['title'];?></h2>
				<h4><?php echo $d->convert($row['date']).', By '.$row['author'];?></h4>
				<img src=<?php echo "images/".$row['img'];?> alt="MyImage"/>
				<?php echo html_entity_decode($row['content']);?>
				<p></p>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
					$q="SELECT id,img FROM content_table WHERE category='".$row['category']."' AND id!=".$row['id'];
					$s=$db->query($q);
					if($s->rowCount()>0){
						while($row=$s->fetch()){
							echo '<a href="post.php?id='.$row['id'].'"><img src="images/'.$row['img'].'" alt="post image"/></a>';
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

	