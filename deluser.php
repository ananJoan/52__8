<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$id=$_GET["id"];
mysqli_query($db,"DELETE FROM `adminuser` WHERE `user` LIKE '$id'");
mysqli_query($db,"DELETE FROM `time` WHERE `user` LIKE '$id'");
mysqli_query($db,"DELETE FROM `work` WHERE `user` LIKE '$id'");
header("location:admin.php");
?>