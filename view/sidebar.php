<?php
include_once 'config/db_connection.php';
include_once 'config/date.php';
include_once 'config/data_short.php';
$db=new DB;
$q="SELECT DISTINCT category FROM content_table";
$s=$db->query($q);
?>
<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
						while($row=$s->fetch()){
							echo '<li><a href="category.php?category='.$row['category'].'">'.$row['category'].'</a></li>';
					}
						?>
					</ul>
			</div>
	<?php
		$q="SELECT * FROM content_table ORDER BY id DESC LIMIT 4";
		$s=$db->query($q);
		$data=new data_short;
		$limit=100;
	?>
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php
					while($row=$s->fetch()){
					echo '<div class="popular clear">
						<h3><a href="post.php?id='.$row['id'].'">'.$row['title'].'</a></h3>
						<a href="post.php?id='.$row['id'].'"><img src="images/'.$row['img'].'" alt="post image"/></a>
						<p>'.$data->short($row['content'],$limit).'</p>	
					</div>';
				}
				?>				
					
			</div>
			
		</div>