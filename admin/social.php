<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $msg="";
    $database_conn = new DB;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['fb']) && !empty($_POST['tw']) && !empty($_POST['ln']) && !empty($_POST['gp'])){
            $facebook      = validation::valid($_POST['fb']);
            $twitter       = validation::valid($_POST['tw']);
            $linkedin      = validation::valid($_POST['ln']);
            $google        = validation::valid($_POST['gp']);
            $query         = "UPDATE social_table SET fb='$facebook',tw='$twitter',ln='$linkedin',gp='$google' WHERE id=1";

            $statement = $database_conn->update($query);
            $statement->execute();
            if($statement->rowCount()>0){
                $msg = '<span style="color:green;font-size:18px">Updated Successfully!</span>';
            }else{
                $msg = '<span style="color:green;font-size:18px">Already Updated!</span>';
            }

        }else{
            $msg = '<span style="color:red;font-size:18px">Field Must Not Be Empty!</span>';
        }
    }
?>       
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
                 <?php
                    $query      = "SELECT * FROM social_table WHERE id=1";
                    $statement  = $database_conn->query($query);
                    if($statement->rowCount()>0){
                        $row = $statement->fetch();
                ?>                     
                 <form action="social.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php echo $msg; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" placeholder="Facebook link.." value="<?php echo $row['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" placeholder="Twitter link.." value="<?php echo $row['tw'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" placeholder="LinkedIn link.." value="<?php echo $row['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                             <input type="text" name="gp" placeholder="Google Plus link.." value="<?php echo $row['gp'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                 <?php }else{
                        echo '<span style="color:red;font-size:18px">Unable To Show This Page!</span>';
                    }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
 <?php include 'inc/footer.php';?>