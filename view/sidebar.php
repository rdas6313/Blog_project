<?php
$database_conn = new DB;
$query 		   = "SELECT DISTINCT category_table.category,category_table.id FROM category_table INNER JOIN content_table ON category_table.id=content_table.category";
$statement 	   = $database_conn->query($query);
?>
<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
						while($row = $statement->fetch()){
							echo '<li><a href="Home/Category/'.$row['id'].'">'.$row['category'].'</a></li>';
					}
						?>
					</ul>
			</div>
	<?php
		$query 		= "SELECT * FROM content_table ORDER BY id DESC LIMIT 4";
		$statement  = $database_conn->query($query);
		$limit=100;
	?>
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php
					while($row=$statement->fetch()){
					echo '<div class="popular clear">
						<h3><a href="Home/Post/'.$row['id'].'">'.$row['title'].'</a></h3>
						<a href="Home/Post/'.$row['id'].'"><img src="post_image/'.$row['img'].'" alt="post image"/></a>
						'.data_short::short($row['content'],$limit).'	
					</div>';
				}
				?>				
					
			</div>
			
		</div>