<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$acc=$_POST["acc"];
$pas=$_POST["pas"];
$type=$_POST["type"];
mysqli_query($db,"INSERT INTO `adminuser`( `user`, `password`, `type`) VALUES ('$acc','$pas','$type')");
header("location:admin.php");
?>