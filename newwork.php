<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$user=$_SESSION["user"];
$works=$_POST["works"];
$content=$_POST["content"];
$nows=$_POST["nows"];
$types=$_POST["types"];
$starts=$_POST["starts"];
$ends=$_POST["ends"];
mysqli_query($db,"INSERT INTO `work`( `works`, `nows`, `types`, `starts`, `ends`, `content`, `user`) VALUES ('$works','$nows','$types','$starts','$ends','$content','$user')");
header("location:user.php");
?>