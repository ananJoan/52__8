<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$id=$_POST["id"];
$pas=$_POST["pas"];
$type=$_POST["type"];
mysqli_query($db,"UPDATE `adminuser` SET `password`='$pas',`type`='$type' WHERE `id` LIKE '$id'");
header("location:admin.php");
?>