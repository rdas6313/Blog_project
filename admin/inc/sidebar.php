 
    <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="titleslogan.php">Title & Slogan</a></li>
                                <li><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="social.php">Social Media</a></li>
                                <li><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>
                        
                         <li><a class="menuitem">Pages</a>
                            <ul class="submenu">
                                <li><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="addpage.php">Add Page</a></li>
                                <?php
                                	$database_conn = new DB;
                                	$query		   = "SELECT * FROM page_table";
                                	$statement     = $database_conn->query($query);
                                	if($statement->rowCount()>0){
                                		while($row = $statement->fetch()){
                                ?>
                                <li><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="updatepage.php?pageid=<?php echo $row['id'];?>"><?php echo $row['title']; ?></a></li>
                                <?php
                            }	}
                                ?>
                                <!--<li><a>Contact Us</a></li>-->
                            </ul>
                        </li>
                         <li><a class="menuitem">Slide Option</a>
                            <ul class="submenu">
                                <li><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="addslider.php">Add Slide</a> </li>
                                <li><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="sliderlist.php">Slide List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>