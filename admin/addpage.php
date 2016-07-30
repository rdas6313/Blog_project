<?php include_once 'inc/header.php'; ?>
<?php 
	$database_conn = new DB;
	$msg           = "";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if($_POST['title']==NULL || $_POST['content']==NULL){
			$msg='<span style="color:red;font-size:18px">Plz Fill Out All The Field</span>';
		}else{
			$title   	= validation::valid($_POST['title']);
			$content    = $_POST['content'];
    		$query      = "INSERT INTO page_table (title,content) VALUES (:placeholder1,:placeholder2)";
    		$statement  = $database_conn->insert($query);
    		$statement->execute(array('placeholder1'=>$title,'placeholder2'=>$content));
    		if($statement->rowCount()>0){
    			 $msg = '<span style="color:green;font-size:18px">Page Created Successfully!</span>';
    		}else{
    			 $msg = '<span style="color:red;font-size:18px">Already Created This kind of Page!</span>';
    		}

    		}
		}
	 
?>

<!--Sidebar-->
<?php include 'inc/sidebar.php'; ?>
<!--Sidebar Ends Here-->

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
                <div class="block">                      
                 <form action="" method="POST">
                    <table class="form">
                    	<tr>
                    		<td>
                    		</td>
                    		<td><?php echo $msg; ?></td>
                    	</tr>   
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="content"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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
 