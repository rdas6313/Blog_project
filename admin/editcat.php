<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';?>
<?php
    if(!isset($_GET['catid']) || empty($_GET['catid'])){
        header('Location:catlist.php');
    }else{
        $catid=$_GET['catid'];
        $database_conn=new DB;
        $query="SELECT * FROM category_table WHERE id='$catid'";
        $statement=$database_conn->query($query);
        if($statement->rowCount()>0){
            $row=$statement->fetch();
            $category=$row['category'];
        }else{
            header('Location:catlist.php');
        }
    }
?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Category</h2>
           <div class="block copyblock">
           <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(!empty($_POST['catname'])){
                        $catname=$_POST['catname'];
                        $database_conn=new DB;
                        $query="SELECT * FROM category_table WHERE category='".$catname."'";
                        $statement=$database_conn->query($query);
                        if($statement->rowCount()>0){
                            echo '<span style="color:red;font-size:18px">Category Name Already Exists.</span>';
                        }else{
                            $query="UPDATE category_table SET category=:placeholder WHERE id=$catid";
                            $statement=$database_conn->update($query);
                            $statement->execute(array(':placeholder'=>$catname));
                            if($statement->rowCount()>0){
                                echo '<span style="color:green;font-size:18px">Updated Successfully!</span>';
                                $category=$catname;
                            }else{
                                echo '<span style="color:red;font-size:18px">Unable to Update!</span>';
                            }
                    }
                    }else{
                        echo '<span style="color:red;font-size:18px">You Must Fill Out The Field!</span>';
                    }     
            }
            ?> 
             <form action="editcat.php?catid=<?php echo $catid;?>" method="POST">
                <table class="form">                    
                    <tr>
                        <td>
                            <input type="text" name="catname" placeholder="<?php echo $category; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr> 
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
<?php include_once 'inc/footer.php'; ?>