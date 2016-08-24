<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
               <?php
               		if($user_role!=1)
						header('Location: index.php');
               		$database_conn		=	new DB;
					if(isset($_GET['delsliderid']) && !empty($_GET['delsliderid'])){
						$delsliderid 	=	$_GET['delsliderid'];
						$query       = "SELECT * FROM slider_table WHERE id=$delsliderid";
                        $statement   = $database_conn->query($query);
                        $statement->execute();
                        $row         = $statement->fetch();
                        $path        = '../post_image/'.$row['img'];
                        if(file_exists($path)){
                           unlink($path);
                        }
						$query			=	"DELETE FROM slider_table WHERE id=$delsliderid";
						if(!$database_conn->delete($query)){
							echo "<style>alert('Unable To Delete!');</style>";
						}

					}
				?>
                <h2>Slider List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Title</th>
							<th>Link</th>
							<th>Slider Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query 					= "SELECT * FROM slider_table";
						$statement 				= $database_conn->query($query);
						if($statement->rowCount()>0){
							$i=1;
							while($row=$statement->fetch()){
					?>

						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['link'];?></td>
							<td><img src="../post_image/<?php echo $row['img']; ?>" width="150px" height="50px"/></td>
							<td><a href="editslider.php?editsliderid=<?php echo $row['id'];?>">Edit</a> || <a onclick="return confirm('Are You sure to delete!');" href="?delsliderid=<?php echo $row['id'];?>">Delete</a></td>
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
   <?php include_once 'inc/footer.php'; ?>