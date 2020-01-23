<?php include 'con.php';?>
<?

  session_start();

$user_check=$_SESSION['room']; 
if (!isset($_SESSION['room'])) {
        /// your code here
header("Location:login.php");
    }


$sql = "SELECT * FROM profile where email='$user_check'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {  
       $pid=$row['pid'];
        $fname=$row['name'];
        $lname=$row['lname'];
        $pic=$row['pic'];

      
    }

} 
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>friend list message </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="messagebox/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="messagebox/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="messagebox/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="messagebox/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="messagebox/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="messagebox/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="messagebox/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="messagebox/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="messagebox/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="messagebox/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class=" skin-blue layout-top-nav">

  <header class="main-header ">
    <!-- Logo -->
  
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       
             <li class="dropdown notifications-menu">
            <a href="index.php" class="dropdown-toggle" >
              <i class="fa fa-home"></i>
            </a>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="post.php" class="dropdown-toggle" >
              <i class="fa fa-th-list"></i>
            </a>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="profilepic/<?=$pic?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?=$fname?> <?=$lname?>                  
</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="profilepic/<?=$pic?>" class="img-circle" alt="User Image">

                <p>
              <?=$fname?> <?=$lname?>                  
                </p>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
                    <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Friends</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->

              <ul class="todo-list">
 
<?php 

$output=0;
function count_unseen_message($to_user_id, $from_user_id, $conn)
{
  $count=0;
  $query = "
  SELECT * FROM chat_message 
  WHERE from_user_id = '$from_user_id' 
  AND to_user_id = '$to_user_id' 
  AND status = '1'
  ";
$result = $conn->query($query);
if ($result->num_rows > 0) 
{
    // output data of each row 1.rahul ,2-vikram singh, 3-vikram gurjar
    while($row = $result->fetch_assoc())
    {  
$count+=1;
  if($count > 0)
  {
    $output = $count;
  }
 
}
}
 else
  {
    $output=0;
  }
return $output;
}

?>


<?php
//show friend list of the user
$name_list='';
$sql = "SELECT from_user_id as non FROM chat_message
          where to_user_id=$pid
                                                        UNION 
         SELECT to_user_id as non FROM chat_message
         where from_user_id=$pid";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
  $stack = array(); //friend list array
    // output data of each row 1.rahul ,2-vikram singh, 3-vikram gurjar
    while($row = $result->fetch_assoc())
    {  
      if($row['non']!=$pid)
      {
        $name_list=$row['non'];
    //echo 'only friend'.$row['non'];

array_push($stack,$name_list);

      }

 
$sql1 = "SELECT * FROM profile where pid='$name_list'";

$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) 
{
    while($row = $result1->fetch_assoc())
    {   
  
     $pid1=$row['pid'];
        $name=$row['name'];
        $lname=$row['lname'];
        ?>

                  <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-edit"></i>
                        
                      </span>
                  <!-- checkbox -->
                   <i class="fa fa-trash-o"></i>
                        
                  <!-- todo text -->
                 <a href="message.php?fewfnoifnoweinfoiewnfoiewfnoiwenfoeiwnfk83274JKB7y239bHBHVJHVJHhbfejhrf=<?=$pid1?>">
                  <span class="text"><?=$name?> <?=$lname?></span>
                  <!-- Emphasis label -->

<?
$color=count_unseen_message($pid1,$pid, $conn);
if($color==0)
{
?>

<small class="label label-primary"><i class="fa fa-envelope-o"></i>

                        <?=$color?> msg
                      </small>
<?
}
else
{
?>

<small class="label label-danger"><i class="fa fa-envelope-o"></i>

                        <?=$color?>new
                      </small>
<?

}
?>                    </a>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                   <a href="message.php?fewfnoifnoweinfoiewnfoiewfnoiwenfoeiwnfk83274JKB7y239bHBHVJHVJHhbfejhrf=<?=$pid1?>"> <i class="fa fa-edit"></i></a>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>



       <?


       
    }
}
  }

}

?>

                </ul>
             

            </div>
            <!-- /.box-body -->
            
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          <!-- /.box -->

         
        </section>



 <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
                    <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">unknown User</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->

              <ul class="todo-list">
 


<?php
//friend list pid array is $stack
//show user list of the user
$sql1 = "SELECT * FROM profile WHERE pid NOT IN (".implode(',',$stack).")";

$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) 
{
    while($row = $result1->fetch_assoc())
    {   
  
     $pid1=$row['pid'];
        $name=$row['name'];
        $lname=$row['lname'];
        ?>

                  <li>
                  <!-- drag handle -->
                  <span class="handle">
                        <i class="fa fa-edit"></i>
                        
                      </span>
                  <!-- checkbox -->
                   <i class="fa fa-trash-o"></i>
                        
                  <!-- todo text -->
                 <a href="message.php?fewfnoifnoweinfoiewnfoiewfnoiwenfoeiwnfk83274JKB7y239bHBHVJHVJHhbfejhrf=<?=$pid1?>">
                  <span class="text"><?=$name?> <?=$lname?></span>
                  <!-- Emphasis label -->

<?
$color=count_unseen_message($pid1,$pid, $conn);
if($color==0)
{
?>

<small class="label label-primary"><i class="fa fa-envelope-o"></i>

                        <?=$color?> msg
                      </small>
<?
}
else
{
?>

<small class="label label-danger"><i class="fa fa-envelope-o"></i>

                        <?=$color?>new
                      </small>
<?

}
?>                    </a>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                   <a href="message.php?fewfnoifnoweinfoiewnfoiewfnoiwenfoeiwnfk83274JKB7y239bHBHVJHVJHhbfejhrf=<?=$pid1?>"> <i class="fa fa-edit"></i></a>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>



       <?


       
    }
}

?>

                  </ul>
            </div>
            <!-- /.box-body -->
            
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          <!-- /.box -->

         
        </section>
       


        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    
    </div>
    <strong>Developed by vikram</strong> 
  </footer>

   <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<script src="messagebox/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="messagebox/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="messagebox/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="messagebox/bower_components/raphael/raphael.min.js"></script>
<script src="messagebox/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="messagebox/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="messagebox/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="messagebox/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="messagebox/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="messagebox/bower_components/moment/min/moment.min.js"></script>
<script src="messagebox/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="messagebox/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="messagebox/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="messagebox/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="messagebox/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="messagebox/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="messagebox/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="messagebox/dist/js/demo.js"></script>
</body>
</html>
