<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';?>
<?php
    $msg = "";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['role'])){
            $name               =   validation::valid($_POST['name']);
            $password           =   md5($_POST['password1']);
            $confirm_password   =   md5($_POST['password2']);
            $username           =   validation::valid($_POST['username']);
            $role               =   $_POST['role'];
            $database_conn      =   new DB;
            $query              =   "SELECT * FROM user_id WHERE username='$username'";
            $statement          =   $database_conn->query($query);
            if($statement->rowCount()>0){
                $msg = '<span style="color:red;font-size:18px">User Name Already Exists.</span>';
            }else if($password!=$confirm_password){
                $msg = '<span style="color:red;font-size:18px">Password Not Matching.</span>';
            }else{
                $query="INSERT INTO user_id (id,username,password,name,role) VALUES (:placeholder1,:placeholder2,:placeholder3,:placeholder4,:placeholder5)";
                $statement=$database_conn->insert($query);
                $statement->execute(array(':placeholder1'=>NULL,':placeholder2'=>$username,':placeholder3'=>$password,':placeholder4'=>$name,':placeholder5'=>$role));
                if($statement->rowCount()>0){
                    $msg    = '<span style="color:green;font-size:18px">Account Created Successfully!</span>';
                }else{
                    $msg    = '<span style="color:red;font-size:18px">Unable to Create Account!</span>';
                }
        }
        }else{
                $msg = '<span style="color:red;font-size:18px">You Must Fill Out The Field!</span>';
        }     
}
?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock">
                 <form action="" method="POST">
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
                                <input type="text" name="name" placeholder="Enter Your Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter User Name..." class="medium" required="required" />
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="password1" placeholder="Enter User Password..." class="medium" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password</label>
                            </td>
                            <td>
                                <input type="password" name="password2" placeholder="Enter User Password..." class="medium" required="required" />
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <select id="select" name="role" required="required">
                                    <option value="">Select Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Author</option>
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
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include_once 'inc/footer.php'; ?>