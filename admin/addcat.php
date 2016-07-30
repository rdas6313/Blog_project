<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
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
                                $query="INSERT INTO category_table (id,category) VALUES (:placeholder1,:placeholder2)";
                                $statement=$database_conn->insert($query);
                                $statement->execute(array(':placeholder1'=>NULL,':placeholder2'=>$catname));
                                if($statement->rowCount()>0){
                                    echo '<span style="color:green;font-size:18px">Save Successfully!</span>';
                                }else{
                                    echo '<span style="color:red;font-size:18px">Unable to Save!</span>';
                                }
                        }
                        }else{
                            echo '<span style="color:red;font-size:18px">You Must Fill Out The Field!</span>';
                        }     
                }
                ?> 
                 <form action="addcat.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catname" placeholder="Enter Category Name..." class="medium" />
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