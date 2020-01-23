<?php
?>
   <?php include 'con.php';?>
<? 
  session_start();
$user_check=$_SESSION['room']; 
if (!isset($_SESSION['room'])) {
        /// your code here
header("Location:index.php");
    }
  //profile information or searcher information

$sql = "SELECT * FROM profile where email='$user_check'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {   $pp1=$row['pid'];
        $p1=$row["name"];
        $p2=$row["lname"];
        $p3=$row["email"];
        $p4=$row["password"];
        $p5=$row["pic"];
        $p6=$row["status"];
    }

} 

else 
{
    header("Location:index.php");
}
?>

<?
//to user id
$to_user_id=$_GET['fewfnoifnoweinfoiewnfoiewfnoiwenfoeiwnfk83274JKB7y239bHBHVJHVJHhbfejhrf'];

$_SESSION['to_user_id'] = $to_user_id;

$sql = "SELECT * FROM profile where pid='$to_user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {   $touserid=$row['pid'];
        $tousername=$row["name"];
        $touserpic=$row["pic"];
   }

} 


	$query = "
	UPDATE chat_message 
	SET status = 0
	WHERE from_user_id =$touserid
	AND to_user_id =  $pp1
	AND status = 1
	";
$result = $conn->query($query);
?>

<html>
<head>
<title>Chat Box</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>

function submitChat() {
	if(form1.msg.value == '') {
		alert("PLEASE TYPR SOMETHING MESSAGE");
		return;
	}
   

  var uname= "<?php echo $p1 ?>";
  var touserid="<?php echo $touserid ?>";
  var fromuserid=	"<?php echo $pp1 ?>";

 //use for to show status 
 window.to_user_id = touserid;
window.from_user_id = fromuserid;
  
  var pic=  "<?php echo $p5 ?>";
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert_msg.php?uname='+uname+'&touserid='+touserid+'&pic='+pic+'&fromuserid='+fromuserid+'&msg='+msg,true);
 // ('GET','insert_msg.php?uname='+uname+'&msg='+msg,true);
	xmlhttp.send();
	form1.msg.value = '';
}

$(document).ready(function(e){
	//update_status();
	$.ajaxSetup({
		cache: false
	});
	$( "#msg_area" ).keyup(function(e) {
		  var code = e.keyCode || e.which;
		 if(code == 13) { //Enter keycode
		   submitChat();
		 }
	});
    setInterval( function(){ $('#chatlogs').load('logs.php'); }, 20000 );

});




 $(document).on('click', '.active', function(){
    var from_user_id = window.from_user_id ;
      var to_user_id = window.to_user_id ;
      alert(to_user_id )
      alert(from_user_id )
    if(confirm("Are you sure you want to remove this chat?"))
    {
      $.ajax({
        url:"remove_chat.php",
        method:"POST",
        data:{from_user_id:from_user_id,to_user_id:to_user_id},
        success:function(data)
        {
          update_chat_history_data();
        }
      })
    }
  });
     
 
</script>


</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
  
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
          <!-- Messages: style can be found in dropdown.less
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 messages</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="messagebox/dist/img/1.jpg" class="img-circle" >
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
-->


             <li class="dropdown notifications-menu">
            <a href="index.php" class="dropdown-toggle" >
              <i class="fa fa-home"></i>
              <span class="label label-warning"></span>
            </a>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="post.php" class="dropdown-toggle" >
              <i class="fa fa-th-list"></i>
              <span class="label label-warning"></span>
            </a>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="profilepic/<?=$pic?>" class="user-image" alt="User Image">
              <span class="hidden-xs">< <?=$p1?> </span>
            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="profilepic/<?=$p5?>" class="img-circle" alt="User Image">

                <p>
                  <?=$p1?>
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
          
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-envelope-o"></i>

              <h3 class="box-title">Messages</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                  </button>
                  
                </div>
              </div>
            </div>
              <!-- chat item -->

<!--

<body>
<form name="form1">
<input type="hidden" name="uname" value="rahul" /> <br />
Your Message: <br />
<textarea id="msg_area" name="msg"></textarea><br />
<a href="#" onclick="submitChat()">Send</a><br /><br />
</form>
<div id="chatlogs">
LOADING CHATLOG...
</div>

</body>
!-->


<div class="box-body chat" id="chat-box">
        <div id="chatlogs">
LOADING CHATLOG...
</div>

</div>
 <form name="form1">
            <div class="box-footer">
              <div class="input-group">


             <input type="text" class="form-control" placeholder="Type message..."  name="msg" id="msg_area">

             <!--<textarea id="msg_area" name="msg"></textarea><br />!-->
              <!-- <div class="input-group-btn">
                 <button type="submit" class="btn btn-default"> <a href="#" onclick="submitChat()"><i class="fa fa-paper-plane " > </i>
                    </a></button>
                </div>
                !-->
<div class="input-group-btn">
<a onclick="submitChat()" class="btn btn-primary" href="#" role="button"><i class="fa fa-paper-plane " > </i></a>
</div>





              </div>
            </div>
        </form>
          </div>
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->


   <!------------------------- show the tasks------------------------------------------->
 <section class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          <div class="box box-success">
  

              <h3 class="box-title">Tasks List</h3>
<?
$i=0;
$task='radhe adra';
$sql1 = "select * from tasks where pid='$to_user_id'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) 
{
    while($row = $result1->fetch_assoc())
 { 

        $taskid=$row["taskid"];
$task=$row["task"];
$rating=5;
$i+=1;
?>

<p>
  <h1>  Task-><? echo $i ?><br><? echo $task;?> </h1>
  
</p>

<?
}
}
?>


            
      
        </div>
         
        </section>


        <!-----------------end the task box------------------------------------------>


        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Www.Roomseeker.in</strong>
  </footer>

   <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>