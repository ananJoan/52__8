<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$id=$_SESSION["user"];
$row=mysqli_query($db,"SELECT * FROM `work` WHERE `user` LIKE '$id'");
while($arr=mysqli_fetch_array($row)){
$rr=array();
array_push($rr,$arr[1]);
array_push($rr,$arr[2]);
array_push($rr,$arr[3]);
array_push($rr,$arr[4]);
array_push($rr,$arr[5]);
array_push($rr,$arr[6]);
array_push($rr,$arr[8]);
array_push($rr,$arr[0]);
echo json_encode($rr)."#";
}
?>