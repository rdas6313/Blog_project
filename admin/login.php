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
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				$username=validation::valid($_POST['username']);
				$password=md5($_POST['password']);
				$database_conn=new DB;
				$query="SELECT * FROM user_id WHERE '".$username."'=username AND '".$password."'=password";
				$statement=$database_conn->query($query);
				if($statement->rowCount()>0){
					$row=$statement->fetch();
					//session::start();
					session::set('id',$row['id']);
					session::set('username',$row['username']);
					header('location:index.php');

				}else{
					echo '<span style="color:red;font-size=18px;">Username Or Password Not matched</span>';	
				}

			}else{
				echo '<span style="color:red;font-size=18px;">You Must Fill All The Field</span>';
			}

		}
	?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>