<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php
    if($user_role!=1)
        header('Location: index.php');
    $database_conn = new DB;
    $msg="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(!empty($_POST['copyright'])){
            $copyright = $_POST['copyright'];
            $query     = "UPDATE copyright_table SET copyright='$copyright' WHERE id=1";
            $statement = $database_conn->update($query);
            $statement->execute();
            if($statement->rowCount()>0){
                $msg = '<span style="color:green;font-size:18px">Updated Successfully!</span>';
            }else{
                $msg = '<span style="color:red;font-size:18px">Already Updated!</span>';
            }

        }else{
                $msg = '<span style="color:red;font-size:18px">Filled Must Not Be Empty!</span>';
        }
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock">
                <?php
                    $query     = "SELECT * FROM copyright_table WHERE id=1";
                    $statement = $database_conn->query($query);
                    if($statement->rowCount()>0){
                        $row = $statement->fetch();
                ?> 
                 <form action="" method="POST">
                    <table class="form">
                        <tr>
                            <td>
                                <?php echo $msg; ?>
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Copyright Text..." value="<?php echo $row['copyright']?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                        }else{
                            echo '<span style="color:red;font-size:18px">Unable To Show This Page!</span>';
                    }
                    ?>
                
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include_once 'inc/footer.php'; ?>