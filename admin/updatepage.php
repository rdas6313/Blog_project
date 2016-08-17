<?php include 'inc/header.php'; ?>
<?php
    if($user_role!=1)
        header('Location: index.php');
    if(!isset($_GET['pageid']) || empty($_GET['pageid'])){
        header('Location: index.php');
    }else{
        $pageid = $_GET['pageid'];
    } 
	$database_conn = new DB;
	$msg           = "";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(@$_POST['delete']=='Delete'){       /* Delete The Page  start */
                    $query      = "DELETE FROM page_table WHERE id=$pageid";
                    $statement  = $database_conn->delete($query);
                    if($statement){
                        header('Location: index.php');
                    }else{
                         $msg = '<span style="color:red;font-size:18px">Unable TO Delete Page!</span>';
                    }

 /* Delete The Page  end */
        }elseif($_POST['submit']=='Save'){      /* Update The Page  start */
                if($_POST['title']==NULL || $_POST['content']==NULL){
                $msg='<span style="color:red;font-size:18px">Plz Fill Out All The Field</span>';
            }else{
                    $title      = validation::valid($_POST['title']);
                    $content    = $_POST['content'];
                    $query      = "UPDATE page_table SET title=:placeholder1,content=:placeholder2 WHERE id=$pageid";
                    $statement  = $database_conn->insert($query);
                    $statement->execute(array('placeholder1'=>$title,'placeholder2'=>$content));
                    if($statement->rowCount()>0){
                         $msg = '<span style="color:green;font-size:18px">Page Updated Successfully!</span>';
                    }else{
                         $msg = '<span style="color:red;font-size:18px">Already Updated This Page!</span>';
                    }
                }   /* Update The Page  end */
            }
        }
	 
?>

<!--Sidebar-->
<?php include 'inc/sidebar.php'; ?>
<!--Sidebar Ends Here-->

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Page</h2>
                <div class="block">
                <?php 
                    $query      = "SELECT * FROM page_table WHERE id=$pageid";
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
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." value ="<?php echo $row['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="content"><?php echo $row['content']; ?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                                <input type="submit" name="delete" Value="Delete" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                }else{
                        echo '<span style="color:red;font-size:18px">Unable To Show Page!</span>';       
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
 