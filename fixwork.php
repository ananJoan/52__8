<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$user=$_SESSION["user"];
$id=$_POST["id"];
$works=$_POST["works"];
$content=$_POST["content"];
$nows=$_POST["nows"];
$types=$_POST["types"];
$starts=$_POST["starts"];
$ends=$_POST["ends"];
mysqli_query($db,"UPDATE `work` SET `works`='$works',`nows`='$nows',`types`='$types',`starts`='$starts',`ends`='$ends',`content`='$content' WHERE `id` LIKE '$id'");
header("location:user.php");
?>