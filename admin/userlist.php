<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
               <?php
               		if($user_role!=1)
						header('Location: index.php');
               		$database_conn	=	new DB;
					if(isset($_GET['deluserid']) && !empty($_GET['deluserid'])){
						$deluserid 			=	$_GET['deluserid'];
						$query			=	"DELETE FROM user_id WHERE id=$deluserid";
						if(!$database_conn->delete($query)){
							echo "<style>alert('Unable To Delete!');</style>";
						}

					}
				?>
                <h2>User List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Username</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query 					= "SELECT * FROM user_id WHERE id!=$user_id";
						$statement 				= $database_conn->query($query);
						if($statement->rowCount()>0){
							$i=1;
							while($row=$statement->fetch()){
					?>

						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php 
								if($row['role']==1)
									echo 'Admin';
								else if($row['role']==2)
									echo 'Author';
							?></td>
							<td><a href="edituser.php?edituserid=<?php echo $row['id'];?>">Edit</a> || <a onclick="return confirm('Are You sure to delete!');" href="?deluserid=<?php echo $row['id'];?>">Delete</a></td>
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