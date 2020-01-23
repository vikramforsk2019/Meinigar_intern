<?php

$uname = $_REQUEST['uname'];
$to_user_id = $_REQUEST['touserid'];
$from_user_id = $_REQUEST['fromuserid'];
$from_user_pic = $_REQUEST['pic'];
//echo $from_user_pic;
//echo $uname;

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'user1');
$msg = mysqli_real_escape_string($con,$_REQUEST['msg']);
//mysqli_query($con,"INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

mysqli_query($con,"INSERT INTO chat_message (`to_user_id`,`from_user_id`,`chat_message`,`status`) VALUES ('$to_user_id','$from_user_id','$msg',1)");

$result1 = mysqli_query($con," SELECT * FROM chat_message 
 WHERE (from_user_id = '".$from_user_id."' 
 AND to_user_id = '".$to_user_id."') 
 OR (from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."') 
 ORDER BY timestamp DESC");

$output='';
 $user_name ='';
while($extract = mysqli_fetch_array($result1)) {


    if($extract["from_user_id"] == $from_user_id)
    {
      $user_name = 'you';
    }
    else
    {
      $user_name = $uname;
      
    }
    if($extract["status"] == '2')
      {
        $output .= '';

        #$chat_message = '<em>This message has been removed</em>';
      }

    else
    {
$output .= '
        <div class="box-body chat" id="chat-box">
               <div class="item">
                <img src="profilepic/'.$from_user_pic.'" alt="user image" class="offline">
                  <?=$from_user_pic?>
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>'. $extract['timestamp'] .'</small>
             '.$user_name.'
                  </a>
                 '. $extract['chat_message'] .'
                </p>
         </div>
         </div>';
  }

}
echo $output;
 ?>