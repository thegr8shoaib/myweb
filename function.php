
<?php
$user_ip = $_SERVER{'REMOTE_ADDR'};

function echo_ip(){
  GLOBAL $user_ip;
  $string ='your ip is :'. $user_ip;
  echo $string;

}
echo_ip();



 ?>
