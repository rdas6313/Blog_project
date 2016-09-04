<?php
    include 'lib/session.php';
    include '../config/db_connection.php';
    include 'lib/validation.php';
    include '../config/data_short.php';
    include '../config/date.php';
    ob_start();
    if(!session::check() || (isset($_GET['action']) && $_GET['action']=='logout')){
        session::end();
        header('location: login.php');
    }else{
        $user_name = session::get('username');
        $user_id   = session::get('id');
        $user_role = session::get('role');
    }
?>
<!DOCTYPE html>
<html>
<head>

   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Update Title and Description | Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />

     <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />

    <link href="css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
    <!--Jquery UI CSS-->
    <link href="css/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!--jQuery Date Picker-->
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>
    <!-- jQuery dialog related-->
    <script src="js/jquery-ui/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.draggable.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.position.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.resizable.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.dialog.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.blind.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.explode.min.js" type="text/javascript"></script>
    <!-- jQuery dialog end here-->
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <!--Fancy Button-->
    <script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>

    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Admin Panel</h1>
					<p>Welcome To Admin Panel</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                    </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo $user_name;?></li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <?php
            $database_conn = new DB;
            if(isset($_GET['messageid']) && !empty($_GET['messageid'])){
                $msgid          = $_GET['messageid'];
                $query          = "UPDATE msg_table SET status=1 WHERE id=$msgid";
                $statement      = $database_conn->query($query);
                $statement->execute();
            }
            $msg           = 0;
            $query         = "SELECT * FROM msg_table WHERE status=0";
            $statement     = $database_conn->query($query);
            if($statement->rowCount()>0){
                $msg = $statement->rowCount();
            }
        ?>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
				<li class="ic-typography"><a href="editprofile.php"><span>Edit Profile</span></a></li>
                <?php if($user_role==1){?>
				<li class="ic-grid-tables"><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="inbox.php"><span>Inbox<?php if($msg>0)echo '('.$msg.')';?></span></a></li>
                <li class="ic-charts"><a href="/blog" target="_blank"><span>Visit Website</span></a></li>
                <li class="ic-charts"><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="adduser.php"><span>Add User</span></a></li>
                <li class="ic-charts"><a onclick="<?php if($user_role!=1)echo 'alert(\'You Have No permission To Access!\');';?>" href="userlist.php"><span>User List</span></a></li>
                <?php }?>
            </ul>
        </div>
        <div class="clear">
        </div>