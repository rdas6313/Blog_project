<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';?>
<?php
    $edituserid = $user_id; 
    $msg        = "";
    $database_conn      =   new DB;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['password2']) || !empty($_POST['password1']) && !empty($_POST['name']) ){
            $name               =   validation::valid($_POST['name']);
            $username           =   $_POST['username'];
            $old_password       =   md5($_POST['password1']);
            $password           =   $_POST['password2'];
            $confirm_password   =   $_POST['password3'];
            $query              =   "SELECT * FROM user_id WHERE password='$old_password' AND username='$username'";
            $statement          =   $database_conn->query($query);
            if($statement->rowCount()>0){
                if($password!=$confirm_password){
                $msg = '<span style="color:red;font-size:18px">Password Not Matching.</span>';
            }else{
                if(empty($password))
                    $query    = "UPDATE user_id SET name='$name'WHERE id=$edituserid";
                else{    
                    $password = md5($password);
                    $query    = "UPDATE user_id SET name='$name',password='$password' WHERE id=$edituserid";
                    
                }
                $statement=$database_conn->update($query);
                $statement->execute();
                if($statement->rowCount()>0){
                    $msg    = '<span style="color:green;font-size:18px">Account Updated Successfully!</span>';
                }else{
                    $msg    = '<span style="color:red;font-size:18px">Already Updated!</span>';
                }
        }    
            }else{
                $msg = '<span style="color:red;font-size:18px">Wrong Password!</span>';
            }
            
    }else{
        $msg    = '<span style="color:red;font-size:18px">You Must Fill The Name Field.</span>';
    }
             
}
?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit User</h2>
               <div class="block copyblock">
                 <form action="" method="POST">
                 <?php 
                    $query      = "SELECT * FROM user_id WHERE id=$edituserid";
                    $statement  = $database_conn->query($query);
                    if($statement->rowCount()>0){
                        $row = $statement->fetch();
                 ?>
                    <table class="form">
                        <tr>
                        <td></td>
                        <td><?php echo $msg;?></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['name'];?>" class="medium" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $row['username'];?>" class="medium" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" name="password1" placeholder="Enter User Old Password..." class="medium" required="required" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" name="password2" placeholder="Enter User New Password..." class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password</label>
                            </td>
                            <td>
                                <input type="password" name="password3" placeholder="Enter User Confirm Password..." class="medium"/>
                            </td>
                        </tr>
            
						<tr>
                            <td>
                            </td> 
                            <td>
                                <input type="submit" name="submit" Value="Press me" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?}else{
                        echo "<style>alert('Unable To Edit!')</style>";
                        }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include_once 'inc/footer.php'; ?>