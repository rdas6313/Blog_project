<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<style>
#email{width:25px;padding-top:5px;}
</style>
<?php
	$database_conn = new DB;
	$msg 		   = "";
	if(isset($_GET['messageid']) && !empty($_GET['messageid'])){
		$msgid 		= $_GET['messageid'];
		$query 		= "DELETE FROM msg_table WHERE id=$msgid";
		$statement  = $database_conn->delete($query); 
		if(!$statement){
			$msg = '<span style="color:red;font-size:18px">Unable To Delete!</span>';
		}
	}
?>								
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
                <?php echo $msg;?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Name</th>
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
						$query		   = "SELECT * FROM msg_table ORDER BY status ASC,id DESC";
						$statement	   = $database_conn->query($query);
						if($statement->rowCount()>0){
							//$i=1;
							while($row = $statement->fetch()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['sub'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo date::convert($row['date']);?></td>
							<td><?php echo data_short::msg_short($row['msg']);?></td>
							<td><img src="img/<?php if($row['status']==0)echo 'email1.png';else echo 'email2.png';?>" id="email"/></td>
							<td><a href="viewmsg.php?messageid=<?php echo $row['id'];?>">View</a> || <a href="replymsg.php?msgid=<?php echo $row['id'];?>">Reply</a> || <a onclick="return confirm('Are U Sure To Delete!');" href="?messageid=<?php echo $row['id'];?>">Delete</a></td>
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
