<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<style>
div.msg{width:80%;padding:5px;margin-left:1px;}
td.special{width:13%;}
a:link.rep{background-color: #d9d9d9;color:black;font-size:15px;padding:7px 10px 7px 10px;margin:1px;text-decoration: none;}
a:hover.rep{background-color: #f2f2f2;}
</style>
<?php
    if(!isset($_GET['msgid']) || empty($_GET['msgid'])){
        header('Location: inbox.php');
    }else{
        $msgid = $_GET['msgid'];
    }
    $database_conn  = new DB;
    $query          = "UPDATE msg_table SET status=1 WHERE id=$msgid";
    $statement      = $database_conn->query($query);
    $statement->execute(); 
?>
    <div class="grid_10">
	
        <div class="box round first grid">
            <h2>View Message</h2>
            <div class="block">  
            <?php
                $query          = "SELECT * FROM msg_table WHERE id=$msgid";
                $statement      = $database_conn->query($query);
                if($statement->rowCount()>0){
                   $row = $statement->fetch();
            ?>             
            
                <table class="form">
                	   
                    <tr>
                        <td class="special">
                            <label>Name</label>
                        </td>
                        <td>
                            <div class="msg">
                                <?php echo $row['name']; ?>
                            </div>
                        </td>
                    </tr>
                
                     <tr>
                        <td class="special">
                            <label>From</label>
                        </td>
                        <td>
                            <div class="msg">
                                <?php echo $row['email'];?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="special">
                            <label>Subject</label>
                        </td>
                        <td>
                            <div class="msg">
                                <?php echo $row['sub'];?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="special">
                            <label>Date</label>
                        </td>
                        <td>
                            <div class="msg">
                                <?php echo date::convert($row['date']);?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;" class="special">
                            <label>Message</label>
                        </td>
                        <td>
                            <div class="msg">
                                <?php echo $row['msg'];?>
                            </div>
                        </td>
                    </tr>
					<tr>
                        <td></td>
                        <td>
                            <a href="replymsg.php?msgid=<?php echo $msgid;?>" class="rep">Reply</a>
                        </td>
                    </tr>
                </table>
                
            <?php 
        }else{
            echo '<span style="color:red;font-size:18px">Unable to Show Message!</span>';
        }?>
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
 

 <!--<textarea class="tinymce">Msg</textarea>
<input type="text" value="ABC" class="medium" readonly="readonly" />
 -->