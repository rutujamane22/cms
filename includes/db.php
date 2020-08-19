<?php
//development connwction
$db['host']="localhost";
$db['user']="root";
$db['pw']="";
$db['name']="cms";

// //remote database connection
// $db['host']="remotemysql.com";
// $db['user']="ol9lbRxuVZ";
// $db['pw']="yeFagUeV4r";
// $db['name']="ol9lbRxuVZ";

foreach($db as $key => $value){
  define(strtoupper($key),$value);
}

$connection = mysqli_connect(HOST , USER , PW , NAME);

// if($connection){
//   echo "we are connected";
// }
//
?>
