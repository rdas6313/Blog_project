<?php include 'view/header.php';?>
<?php
	$msg = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
	$name 		= validation::valid($_POST['name']);
	$sub  		= validation::valid($_POST['sub']);
	$email  	= validation::valid($_POST['email']);
	$message 	= validation::valid($_POST['Message']);
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		$query = "INSERT INTO msg_table (name,sub,email,msg) VALUES (:placeholder1,:placeholder2,:placeholder3,:placeholder4)";
		$statement = $database_conn->insert($query);
		$statement->execute(array(':placeholder1'=>$name,':placeholder2'=>$sub,':placeholder3'=>$email,':placeholder4'=>$message));
		if($statement->rowCount()>0){
			$msg = '<span style="color:green;font-size:18px">Message Sent Successfully!</span>';
		}else{
			$msg = '<span style="color:red;font-size:18px">Unable To Send Message!</span>';	
		}
	}else{
		$msg = '<span style="color:red;font-size:18px">Invalid Email!</span>';
	}
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
			<form action="" method="post">
				<table>
				<tr>
					<td></td>
					<td><?php echo $msg; ?></td>
				</tr>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="name" placeholder="Enter first name" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message Subject:</td>
					<td>
					<input type="text" name="sub" placeholder="Enter Message Subject" required="1"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea required="1" name="Message"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
<?php include 'view/sidebar.php';?>
<?php include 'view/footer.php';?>