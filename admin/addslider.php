<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';?>
<?php
    if($user_role!=1)
        header('Location: index.php');
    
    $database_conn  = new DB;
    $msg            = "";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['title']==NULL || $_POST['link']==NULL || $_FILES['img']['name']==NULL){
            $msg    = '<span style="color:red;font-size:18px">Plz Fill Out All The Field</span>';
        }else if(!filter_var($_POST['link'],FILTER_VALIDATE_URL)){
            $msg    = '<span style="color:red;font-size:18px">Invalid URL Format</span>';
        }else{
            $title        = validation::valid($_POST['title']);
            $link         = $_POST['link'];
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
                $unique_name  = substr(md5(time()),0,10).'.'.$extension;
                $new_location = '../post_image/'.$unique_name;
                move_uploaded_file($tmp_location,$new_location);
                $query="INSERT INTO slider_table (title,img,link) VALUES ('$title','$unique_name','$link')";
                $statement = $database_conn->insert($query);
                $statement->execute();
                if($statement->rowCount()>0){
                     $msg='<span style="color:green;font-size:18px">Save Successfully!</span>';
                }else{
                     $msg='<span style="color:red;font-size:18px">Unable To Save Data!</span>';
                }

            }
        }
    } 
?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add Slider</h2>
               <div class="block copyblock">
                 <form action="addslider.php" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="title" placeholder="Enter Your Slider Title..." class="medium" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>link</label>
                            </td>
                            <td>
                                <input type="text" name="link" placeholder="Enter Your Slider Link..." class="medium" required="required" />
                            </td>
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
                                <input type="submit" name="submit" Value="Add" />
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