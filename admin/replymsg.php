<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php 
	$database_conn=new DB;
	$msg="";
	if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
        header('Location: inbox.php');
    }else{
        $msgid = $_GET['msgid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['from'] == NULL || $_POST['sub'] == NULL || $_POST['msg'] == NULL || $_POST['to'] == NULL){
            $msg = '<span style="color:red;font-size:18px">Plz Fill Out All The Field</span>';
        }else{
            $to      = $_POST['to'];
            $headers = "From: ".$_POST['from'];
            $sub     = $_POST['sub'];
            $message = $_POST['msg'];
            if(mail($to,$sub,$message,$headers)){
                $msg = '<span style="color:green;font-size:18px">Email Sent Successfully!</span>';
            }else{
                $msg = '<span style="color:red;font-size:18px">Unable To Send Mail!</span>';
            }
        }
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Reply Message</h2>
                <div class="block">  
                 <?php
                    $query      = "SELECT * FROM msg_table WHERE id=$msgid";
                    $statement  = $database_conn->query($query);
                    if($statement->rowCount()>0){
                        $row = $statement->fetch();
                 ?>            
                 <form action="" method="POST">
                    <table class="form">
                    	<tr>
                    		<td>
                    		</td>
                    		<td><?php echo $msg; ?></td>
                    	</tr>   
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name="to" value="<?php echo $row['email'];?>" class="medium" readonly="readonly"/>
                            </td>
                        </tr>
                    
                         <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="from" placeholder="Enter Your Email..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="sub" placeholder="Enter Message Subject..." class="medium" />
                            </td>
                        </tr>
        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="msg"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                }else{
                    echo '<span style="color:red;font-size:18px">Unable To Reply Message!</span>';
                }
                    ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
 
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>



    
<?php include_once 'inc/footer.php';?>
 