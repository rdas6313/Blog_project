<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    
    $database_conn  = new DB;
	if(isset($_GET['delid']) && !empty($_GET['delid'])){
		$delid          = $_GET['delid'];
		$query			= "SELECT img FROM content_table WHERE id=$delid";
		$statement      = $database_conn->query($query);
		$row 			= $statement->fetch();
		$name 			= $row['img'];
		$query          = "DELETE FROM content_table WHERE id=$delid";
		if(!$database_conn->delete($query)){
			echo '<span style="color:red;font-size:18px">Unable to Delete Data!</span>';
		}else{
			$path="../post_image/".$name;
			if(file_exists($path)){
				unlink($path);
			}else{
				echo 'File Not Exists';
			}
		}

	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Title</th>
							<th>Author</th>
							<th>Description</th>
							<th>Category</th>
							<th>Date</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
							$query		   = "SELECT content_table.*,category_table.category FROM content_table JOIN category_table ON content_table.category=category_table.id";
							$statement     = $database_conn->query($query);
							if($statement->rowCount()>0){
								while($row=$statement->fetch()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['author']; ?></td>
							<td><?php echo data_short::short($row['content'],45); ?></td>
							<td><?php echo $row['category']; ?></td>
							<td><?php echo date::convert($row['date']); ?></td>
							<td><img src="../post_image/<?php echo $row['img']; ?>" width="50px" height="50px"/></td>
							<!--<td class="center"> 4</td>-->
							<td><a href="editpost.php?editid=<?php echo $row['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure About it!')" href="?delid=<?php echo $row['id'];?>">Delete</a></td>
						</tr>
					<?php
							}
						}
					?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
 
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
  <?php include 'inc/footer.php';?>