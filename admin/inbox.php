<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<style>
#email{width:25px;padding-top:5px;}
</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Subject</th>
							<th>Email</th>
							<th>Date</th>
							<th>Message</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$database_conn = new DB;
						$query		   = "SELECT * FROM msg_table ORDER BY status DESC";
						$statement	   = $database_conn->query($query);
						if($statement->rowCount()>0){
							$i=1;
							while($row = $statement->fetch()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['sub'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo date::convert($row['date']);?></td>
							<td><?php echo data_short::msg_short($row['msg']);?></td>
							<td><img src="img/<?php if($row['status']==0)echo 'email2.png';else echo 'email1.png';?>" id="email"/></td>
							<td><a href="#">View</a> || <a href="#">Reply</a> || <a href="#">Delete</a></td>
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
    <script type="text/javascript" src="js/table/table.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
<?php include_once 'inc/footer.php'; ?>
