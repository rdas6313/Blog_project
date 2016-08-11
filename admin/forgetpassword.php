<?php
	include 'lib/validation.php';
	include '../config/db_connection.php';
	include 'lib/session.php';
	if(session::check()){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	<?php 
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if(!empty($_POST['email']) && !empty($_POST['username'])){
				$email 			= validation::valid($_POST['email']);
				$username 		= validation::valid($_POST['username']);
				if(filter_var($email,FILTER_VALIDATE_EMAIL)){
					$database_conn 	= new DB;
					$query 			= "SELECT * FROM user_id WHERE username='$username' AND email='$email'";
					$statement 		= $database_conn->query($query);
					if($statement->rowCount()>0){
						$row   		  = $statement->fetch();
						$id    		  = $row['id'];
						$password 	  = substr($email,0,3).substr(md5(time()),0,5);
						$new_password = md5($password);
						$query 	   	  = "UPDATE user_id SET password='$new_password' WHERE id=$id";
						$statement    = $database_conn->query($query); 
						if($statement->rowCount()>0){
							echo 'Check Your Email For Password-'.$password;
							/*
								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= 'From: Blog <blog@example.com>' . "\r\n";
								$to 	  = $email;
								$subject = 'Forget Password Mail';
								$message = 'Hello '.$row['name'].',\nYour Username is '.$username.' And Password is '.$password.'.Please <a href="#">Login</a> With This Password.\nThank You.';
								if(mail($to,$subject,$message,$headers)){
										echo '<span style="color:red;font-size=18px;">Check Your Email For Password!</span>';				
								}else{
										echo '<span style="color:red;font-size=18px;">Unable To Send Mail!</span>';
								}

							*/
						}

					}else{
						echo '<span style="color:red;font-size=18px;">Username Or Email Not matched!</span>';	
					}
				}else{
					echo '<span style="color:red;font-size=18px;">Invalid Email!</span>';
				}

			}else{
				echo '<span style="color:red;font-size=18px;">You Must Fill All The Field</span>';
			}

		}
	?>
		<form action="" method="post">
			<h1>Forget Password</h1>
			<div>
				<input type="text" placeholder="Username" required="required" name="username"/>
			</div>
			<div>
				<input type="text" placeholder="Email Address" required="required" name="email"/>
			</div>
			<div>
				<input type="submit" value="Send Password" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>