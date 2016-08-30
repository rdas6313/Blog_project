<?php include_once 'view/header.php';?>	
<?php
	if(!empty($_POST['search'])){
		$search			= validation::valid($_POST['search']);
	}else if(!empty($_GET['search'])){
		$search			= validation::valid($_GET['search']);
	}else{
		header('Location: 404.php');
	}
	$database_conn	= new DB;
	$query 			= "SELECT * FROM content_table INNER JOIN category_table ON content_table.category=category_table.id WHERE category_table.category LIKE '%".$search."%' OR content_table.title LIKE '%".$search."%' OR content_table.author LIKE '%".$search."%' OR content_table.content LIKE '%".$search."%'"; 
	$statement		= $database_conn->query($query);
	$per_page 		= 3;
    $totalrow 		= $statement->rowCount();
    if($totalrow>0){
		$totalpage  = ceil($totalrow/$per_page);
		if(isset($_GET['page'])){
			if($_GET['page']>0 && $_GET['page']<=$totalpage)
				$page = $_GET['page'];
			else
				header('location: 404.php');
		}else{
			$page 	  = 1;
		}
		$start 		  = ($page-1)*$per_page;
		$query 		  = "SELECT content_table.id,content_table.title,content_table.date,content_table.author,content_table.img,content_table.content FROM content_table INNER JOIN category_table ON content_table.category=category_table.id WHERE category_table.category LIKE '%".$search."%' OR content_table.title LIKE '%".$search."%' OR content_table.author LIKE '%".$search."%' OR content_table.content LIKE '%".$search."%' ORDER BY content_table.id DESC LIMIT ".$start.",".$per_page;
		$statement    = $database_conn->query($query);
		$limit=200;
	}
?>

<?php include 'view/slider.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php
		if($totalrow>0){
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
			echo '<a href="Home/Search/'.($page-1).'/'.$search.'" class="ml" id="left">Less</a>';
		}
		if($page+1<=$totalpage){
			echo '<a href="Home/Search/'.($page+1).'/'.$search.'" class="ml" id="right">More</a>';
		}
	}else{
		echo '<p><b>No search result found</b></p>';
	}
		?>
		</div>
		
		<?php include 'view/sidebar.php';?>
	</div>
<?php include 'view/footer.php';?>