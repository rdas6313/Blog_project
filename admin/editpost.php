<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php 
	$database_conn=new DB;
	$msg="";
    if(!isset($_GET['editid']) || empty($_GET['editid'])){
        header('Location:postlist.php');
    }else{
        $editid=$_GET['editid'];
        if(isset($_GET['img_name']) && !empty($_GET['img_name'])){
             $path        = '../post_image/'.$_GET['img_name'];
             if(file_exists($path)){
               unlink($path);
            }
        }
    }
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if($_POST['title']==NULL || $_POST['author']==NULL || $_POST['category']==NULL || $_POST['content']==NULL || $_FILES['image']['name']==NULL){
			$msg='<span style="color:red;font-size:18px">Plz Fill Out All The Field</span>';
		}else{
			$title   	=validation::valid($_POST['title']);
			$author  	=validation::valid($_POST['author']);
			$category   =validation::valid($_POST['category']);
			$content    =$_POST['content'];
    	/*   	Woking With Image Files */
    		$name  		  = $_FILES['image']['name'];
    		$size         = $_FILES['image']['size'];
    		$tmp_location = $_FILES['image']['tmp_name'];

    		$allow_extension = array('jpg','jpeg','png');
    		$allow_size 	 = 1024*1024*2;
    		$name            = explode('.',$name);
    		$extension 		 = end($name);
    		if(!validation::in_it($allow_extension,$extension) || $size>$allow_size){
    			$msg = '<span style="color:red;font-size:18px">Check Image Extension or Size!</span>';
    		}else{
    			$unique_name  = substr(md5(time()),0,10).'.'.$extension;
    			$new_location = '../post_image/'.$unique_name;
    			move_uploaded_file($tmp_location,$new_location);
    			$query="UPDATE content_table SET title='$title',author='$author',category=$category,content='$content',img='$unique_name' WHERE id=$editid";
    			$statement = $database_conn->insert($query);
    			$statement->execute();
    			if($statement->rowCount()>0){
    				 $msg='<span style="color:green;font-size:18px">Data Updated Successfully!</span>';
    			}else{
    				 $msg='<span style="color:red;font-size:18px">Unable To Update Data!</span>';
    			}

    		}
		}
	} 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">  
                <?php
                    $query     = "SELECT * FROM content_table WHERE id=$editid";
                    $statement = $database_conn->query($query);
                    if($statement->rowCount()>0){
                        $content_row = $statement->fetch();
                        $img_name    = $content_row['img'];
                ?>
                 <form action="editpost.php?editid=<?php echo $editid; ?>&img_name=<?php echo $img_name;?>" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="title" placeholder="<?php echo $content_row['title']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="category">
                                <?php
                                	$query="SELECT * FROM category_table";
                                	$statement=$database_conn->query($query);
                                	if($statement->rowCount()>0){
                                		while($row=$statement->fetch()){
                                ?>
                                    		<option value="<?php echo $row['id']; ?>"<?php
                                            if($content_row['category'] == $row['id']){ echo 'selected';}?> 
                                            ><?php echo $row['category']; ?></option>
                                <?php
                            	}
                                	}else{
                                		echo '<option>No Category Found</option>';	
                                	}
                                ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                         <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" placeholder="<?php echo $content_row['author'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="content"><?php echo $content_row['content'];?></textarea>
                            </td>
                        </tr>
                        <?php 
                            }else{
                                header('Location:postlist.php');
                            }?>
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
 