<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';?>
<?php
    if($user_role!=1)
        header('Location: index.php');
    if(!isset($_GET['editsliderid']) || empty($_GET['editsliderid'])){
        header('Location: sliderlist.php');
    }else{
        $editsliderid = $_GET['editsliderid'];
    }
    $msg = "";
    $database_conn      =   new DB;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['title']==NULL || $_POST['link']==NULL){
            $msg    = '<span style="color:red;font-size:18px">Plz Fill Out All The Field</span>';
        }else if(!filter_var($_POST['link'],FILTER_VALIDATE_URL)){
            $msg    = '<span style="color:red;font-size:18px">Invalid URL Format</span>';
        }else{
            $title        = validation::valid($_POST['title']);
            $link         = $_POST['link'];
            if(!isset($_FILES['img']['name']) || empty($_FILES['img']['name'])){
                $query     = "UPDATE slider_table SET title='$title',link='$link' WHERE id=$editsliderid";
            }else{
                         /*      Woking With Image Files */
                    $name         = $_FILES['img']['name'];
                    $size         = $_FILES['img']['size'];
                    $tmp_location = $_FILES['img']['tmp_name'];

                    $allow_extension = array('jpg','jpeg','png');
                    $allow_size      = 1024*1024*2;
                    $name            = explode('.',$name);
                    $extension       = end($name);
                    if(!validation::in_it($allow_extension,$extension) || $size>$allow_size){
                        $msg = '<span style="color:red;font-size:18px">Check Image Extension or Size!</span>';
                    }else{
                        $query       = "SELECT * FROM slider_table WHERE id=$editsliderid";
                        $statement   = $database_conn->query($query);
                        $statement->execute();
                        $row         = $statement->fetch();
                        $path        = '../post_image/'.$row['img'];
                        if(file_exists($path)){
                           unlink($path);
                        }
                        $unique_name  = substr(md5(time()),0,10).'.'.$extension;
                        $new_location = '../post_image/'.$unique_name;
                        move_uploaded_file($tmp_location,$new_location);
                        $query     = "UPDATE slider_table SET title='$title',img='$unique_name',link='$link' WHERE id=$editsliderid";
                    }
            }
                $statement = $database_conn->update($query);
                $statement->execute();
                if($statement->rowCount()>0){
                     $msg='<span style="color:green;font-size:18px">Update Successfully!</span>';
                }else{
                     $msg='<span style="color:red;font-size:18px">Unable To Update Data!</span>';
                }

            
        }
    } 
?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit User</h2>
               <div class="block copyblock">
                 <form action="" method="POST" enctype="multipart/form-data">
                 <?php 
                    $query      = "SELECT * FROM slider_table WHERE id=$editsliderid";
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
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $row['title'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Link</label>
                            </td>
                            <td>
                                <input type="text" name="link" value="<?php echo $row['link'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><img src="../post_image/<?php echo $row['img']; ?>" width="200px" height="50px"/></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Slider Image</label>
                            </td>
                            <td>
                                <input type="file" name="img"/>
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