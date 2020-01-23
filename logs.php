
<?php include 'con.php';?>

<?php

  session_start();
$user_check=$_SESSION['room']; 
if (!isset($_SESSION['room'])) {
header("Location:login.php");
    }




$to_user=$_SESSION['to_user_id'];
$sql = "SELECT * FROM profile where email='$user_check'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {   $from_pid=$row['pid'];
        
    }

} 




$query = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_pid."' AND to_user_id = '".$to_user."')
 OR (from_user_id = '".$to_user."' 
  AND to_user_id = '".$from_pid."') 
  ORDER BY timestamp ASC
  ";


$output='';
$result1 = mysqli_query($conn,$query);

while($extract = mysqli_fetch_array($result1))

 {
    if($to_user==$extract['to_user_id'])
    {
 	?>

  <div class="item">
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">friend</span>
                    <span class="direct-chat-timestamp pull-left"><?=$extract['timestamp']?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="profilepic/<?=$extract['from_pic']?>" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?=$extract['chat_message']?>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </div>


     

   

<?
}
else
{
?>
 
     <div class="item">
                <!-- Message to the right -->
                <div class="direct-chat-msg ">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">you</span>
                    <span class="direct-chat-timestamp pull-right"><?=$extract['timestamp']?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="profilepic/<?=$extract['from_pic']?>" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?=$extract['chat_message']?>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </div>




<?

}
}

?>
<!--
/*

while($extract = mysqli_fetch_array($result1)) 
{

if($extract["status"] == '2')
      {
        $output .= '';
      }
 else
    {
    $output .= '
 <div class="item">
                <img src="profilepic/'.$extract['from_pic'].'"  class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>'.$extract['timestamp'].'</small>
                   '.$extract['from_name'].'
                  </a>
                  '. $extract['chat_message'] .'
                </p>
              </div>';


   }

}
echo $output;
?>
*/

-->










