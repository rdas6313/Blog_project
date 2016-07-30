<?php include_once 'view/header.php';?>
<?php include_once 'config/db_connection.php';?>
<?php include_once 'config/date.php';?>	
<?php include_once 'config/data_short.php';?>	

<?php
	if(isset($_GET['category']) && !empty($_GET['category'])){
		$cat=$_GET['category'];
	}else{
		header('location: 404.php');
	}
	$db=new DB();
	$q="SELECT * FROM content_table WHERE category='".$cat."'";
	$s=$db->query($q);
	define('PAGE',3,0);
    $totalrow=$s->rowCount();
	if($totalrow<1){
		header('location: 404.php');	
	}
	$totalpage=ceil($totalrow/PAGE);
	if(isset($_GET['page'])){
		if($_GET['page']>0 && $_GET['page']<=$totalpage)
			 $page=$_GET['page'];
		else
			header('location: 404.php');

	}else{
		$page=1;
	}
	$start=($page-1)*PAGE;
	$q="SELECT * FROM content_table WHERE category='".$cat."' ORDER BY id DESC LIMIT ".$start.",".PAGE;
	$s=$db->query($q);
	$d=new date;
	$data=new data_short;
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
			while($row=$s->fetch()){
			echo '<div class="samepost clear">
				<h2><a href="post.php?id='.$row['id'].'">'.$row['title'].'</a></h2>
				<h4>'.$d->convert($row['date']).', By <a href="#">'.$row['author'].'</a></h4>
				 <a href="post.php?id='.$row['id'].'"><img src="post_image/'.$row['img'].'" alt="post image"/></a>
				<p>
					'.$data->short($row['content'],$limit).'
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