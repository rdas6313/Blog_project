<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $msg           = "";
    $database_conn = new DB;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['title']) && !empty($_POST['slogan'])){
            $title      = validation::valid($_POST['title']);
            $slogan     = validation::valid($_POST['slogan']);
            $query      = "UPDATE title_slogan_table SET title='$title',slogan='$slogan' WHERE id=1";
            if(isset($_FILES['logo']['name']) && $_FILES['logo']['name']!=NULL){
                $name            = $_FILES['logo']['name'];
                $size            = $_FILES['logo']['size'];
                $tmp_location    = $_FILES['logo']['tmp_name'];

                $allow_extension = array('png');
                $allow_size      = 1024*1024*1;
                $name            = explode('.',$name);
                $extension       = end($name);
                if(!validation::in_it($allow_extension,$extension) || $size>$allow_size){
                    $msg = '<span style="color:red;font-size:18px">Check Logo Extension or Size!</span>';
                }else{
                    $unique_name  = substr(md5(time()),0,10).'.'.$extension;
                    $new_location = '../post_image/'.$unique_name;
                    move_uploaded_file($tmp_location,$new_location);
                    $query = "UPDATE title_slogan_table SET title='$title',slogan='$slogan',logo='$unique_name' WHERE id=1";
                    if(isset($_GET['logo']) && !empty($_GET['logo'])){
                         $path        = '../post_image/'.$_GET['logo'];
                         if(file_exists($path)){
                           unlink($path);
                        }
                    } 
                }
            }
            if(empty($msg)){
                echo $_FILES['logo']['name'];
                $statement  = $database_conn->update($query);
                $statement->execute();
                if($statement->rowCount()>0){
                    $msg = '<span style="color:green;font-size:18px">Updated Successfully!</span>';
                }else{
                    $msg = '<span style="color:red;font-size:18px">Already Updated!</span>';    
                }
        }

        }else{
            $msg = '<span style="color:red;font-size:18px">Field Must Not Be Empty!</span>';
        }
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">
                <?php
                    $query      = "SELECT * FROM title_slogan_table WHERE id=1";
                    $statement  = $database_conn->query($query);
                    if($statement->rowCount()>0){
                        $row = $statement->fetch();
                ?>               
                 <form action="?logo=<?echo $row['logo'];?>" method="POST" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                            </td>
                            <td>
                                <?php echo $msg; ?>
                            </td>
                        </tr>					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="" value="<?php echo $row['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" placeholder="" value="<?php echo $row['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						<tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo"/><span style="color:red;font-size:18px">(**Optional)</span>
                            </td>
                            
                        </tr>



						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }else{
                            echo '<span style="color:red;font-size:18px">Unable To Show This Page!</span>';
                        }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include 'inc/footer.php';?>