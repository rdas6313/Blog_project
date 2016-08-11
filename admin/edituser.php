<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';?>
<?php
    if($user_role!=1)
        header('Location: index.php');
    if(!isset($_GET['edituserid']) || empty($_GET['edituserid'])){
        header('Location: userlist.php');
    }else{
        $edituserid = $_GET['edituserid'];
    }
    $msg = "";
    $database_conn      =   new DB;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['role']) && !empty($_POST['email'])){
            $name               =   validation::valid($_POST['name']);
            $password           =   $_POST['password1'];
            $confirm_password   =   $_POST['password2'];
            $username           =   validation::valid($_POST['username']);
            $email              =   validation::valid($_POST['email']);
            $role               =   $_POST['role'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $msg = '<span style="color:red;font-size:18px">Invalid Email!</span>';
            }else{
                if($password!=$confirm_password){
                $msg = '<span style="color:red;font-size:18px">Password Not Matching.</span>';
            }else{
                if(empty($password))
                    $query    ="UPDATE user_id SET name='$name',username='$username',role=$role,email='$email' WHERE id=$edituserid";
                else{    
                    $password = md5($password);
                    $query    ="UPDATE user_id SET name='$name',username='$username',password='$password',role=$role,email='$email' WHERE id=$edituserid";
                    
                }
                $statement=$database_conn->update($query);
                $statement->execute();
                if($statement->rowCount()>0){
                    $msg    = '<span style="color:green;font-size:18px">Account Updated Successfully!</span>';
                }else{
                    $msg    = '<span style="color:red;font-size:18px">Already Updated!</span>';
                }
            }
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
                                <input type="text" name="name" value="<?php echo $row['name'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $row['email'];?>" class="medium" />
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
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="password1" placeholder="Enter User Password..." class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password</label>
                            </td>
                            <td>
                                <input type="password" name="password2" placeholder="Enter User Password..." class="medium"/>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option value="1" <?php if($row['role']==1)echo 'selected';?>>Admin</option>
                                    <option value="2" <?php if($row['role']==2)echo 'selected';?>>Author</option>
                                </select>
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