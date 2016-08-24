<?php
	$query2 	= "SELECT * FROM slider_table";
	$statement2 = $database_conn->query($query2);
	$statement2->execute();
?>
<div class="slidersection templete clear">
    <div id="slider">
    <?php
    	if($statement2->rowCount()>0){
			while($row = $statement2->fetch()){
    ?>
        <a href="<?php echo $row['link'];?>"><img src="post_image/<?php echo $row['img'];?>" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>" /></a>
    <?php
		}
	}
	?>
    </div>

</div>
