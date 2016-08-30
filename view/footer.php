
	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<?php
				$query 		   = "SELECT * FROM page_table";
				$statement     = $database_conn->query($query);	
			?>
			<li><a href="Home">Home</a></li>
			<?php 
				if($statement->rowCount()>0){
					while($row = $statement->fetch()){
			?>
				<li><a href="Home/Page/<?php echo $row['id'];?>"><?php echo $row['title'];?></a></li>
			<?php } }?>
			<li><a href="Home/Contact">Contact</a></li>
		</ul>
	  </div>
	<?php
	  $query = "SELECT * FROM copyright_table";
	  $statement = $database_conn->query($query);
	  $row 		 = $statement->fetch();
	?>
	  <p>&copy; <?php echo $row['copyright'].' '.date('Y').'.';?></p>
	</div>
	<?php
	  $query = "SELECT * FROM social_table";
	  $statement = $database_conn->query($query);
	  $row 		 = $statement->fetch();
	?>
	<div class="fixedicon clear">
		<a href="http://www.<?php echo $row['fb'];?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.<?php echo $row['tw'];?>" target="_blank" ><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.<?php echo $row['ln'];?>" target="_blank" ><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="http://www.<?php echo $row['gp'];?>" target="_blank" ><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>
<?php ob_end_flush();?>
