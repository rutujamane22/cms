<?php

$db['host']="localhost";
$db['user']="root";
$db['pw']="";
$db['name']="cms";

foreach($db as $key => $value){
  define(strtoupper($key),$value);
}

$connection = mysqli_connect(HOST , USER , PW , NAME);

// if($connection){
//   echo "we are connected";
// }
//
?>
