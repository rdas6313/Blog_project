<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
               <?php
               		
					if(isset($_GET['catid']) && !empty($_GET['catid'])){
						$catid=$_GET['catid'];
						$database_conn=new DB;
						$query="DELETE FROM category_table WHERE id=$catid";
						if(!$database_conn->delete($query)){
							echo '<span style="color:red;font-size:18px">Unable to Delete Data!</span>';
						}

					}
				?>
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$database_conn=new DB;
						$query = "SELECT * FROM category_table";
						$statement=$database_conn->query($query);
						if($statement->rowCount()>0){
							$i=1;
							while($row=$statement->fetch()){
					?>

						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo $row['category'];?></td>
							<td><a  href="editcat.php?catid=<?php echo $row['id'];?>">Edit</a><?php if($user_role==1) echo '|| <a onclick="return confirm(\'Are You sure to delete!\');" href="catlist.php?catid='.$row['id'].'">Delete</a>';?></td>
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