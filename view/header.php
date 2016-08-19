<?php
include_once 'config/db_connection.php';
include_once 'config/date.php';
include_once 'config/data_short.php';
include_once 'config/validation.php';	
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		$database_conn = new DB; 
		if(isset($_GET['pageid']) && !empty($_GET['pageid'])){
			$pageid 	= $_GET['pageid'];
			$query		= "SELECT * FROM page_table WHERE id=$pageid";
			$statement	= $database_conn->query($query);
			$row 		= $statement->fetch();
	?>
			<title><?php echo $row['title'];?></title>
	<?php				
		}else if(isset($_GET['id']) && !empty($_GET['id'])){
			$id 		= $_GET['id'];
			$query		= "SELECT * FROM content_table WHERE id=$id";
			$statement	= $database_conn->query($query);
			$row 		= $statement->fetch();
	?>
			<title><?php echo $row['title'];?></title>
	<?php
		}else if(isset($_GET['category']) && !empty($_GET['category'])){
			$cat 		= $_GET['category'];
			$query		= "SELECT * FROM category_table WHERE id=$cat";
			$statement	= $database_conn->query($query);
			$row 		= $statement->fetch();
	?>
			<title><?php echo $row['category'].' category Results';?></title>
	<?php
		}else if(isset($_GET['search']) && !empty($_GET['search'])){
			$search 	= $_GET['search'];
	?>
			<title><?php echo $search.' search Results';?></title>
	<?php
		}else{
			$pagename = $_SERVER['SCRIPT_NAME'];
			$pagename = basename($pagename,'.php');
			if($pagename=='index'){
				$pagename = 'Home';
			}
	?>
		<title><?php echo $pagename;?></title>
	<?php
		}
	?>
	<title>Basic Website</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">	
			<div class="logo">
				<?php
					$database_conn = new DB;
					$query 		   = "SELECT * FROM title_slogan_table";
					$statement     = $database_conn->query($query);
					$row 		   = $statement->fetch();
					if($statement->rowCount()>0){	
				?>
				<img src="post_image/<?php echo $row['logo'];?>" alt="Logo"/>
				<h2><?php echo $row['title'];?></h2>
				<p><?php echo $row['slogan'];?></p>
				<?php }?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
			<?php
				$query 		   = "SELECT * FROM social_table";
				$statement     = $database_conn->query($query);
				$row 		   = $statement->fetch();
				if($statement->rowCount()>0){	
			?>
				<a href="<?php echo $row['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<?php
			$query 		   = "SELECT * FROM page_table";
			$statement     = $database_conn->query($query);	
		?>
		<li><a id="active" href="index.php">Home</a></li>
		<?php 
			if($statement->rowCount()>0){
				while($row = $statement->fetch()){
		?>
		<li><a href="page.php?pageid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></li>
		<?php } }?>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>
