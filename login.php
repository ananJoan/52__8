<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
if(!empty($_POST)){
    $codeans=$_SESSION["code"];
    $acc=$_POST["acc"];
    $pas=$_POST["pas"];
    $codes=$_POST["codes"];
    $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `user` LIKE '$acc'");
    $arr=mysqli_fetch_array($row);
    date_default_timezone_set('Asia/Taipei');
    $time=date('Y/m/d H:i:s');
    if(empty($arr[0])){
        echo"帳號輸入錯誤";
        $_SESSION["die"]++;
    }else if($pas!=$arr[2]){
        echo"密碼輸入錯誤";
        $_SESSION["die"]++;
    }else if($codeans!=$codes){
        echo"驗證碼輸入錯誤";
        $_SESSION["die"]++;
    }else{
        $_SESSION["user"]=$acc;
        mysqli_query($db,"INSERT INTO `time`( `user`, `time`, `type`) VALUES ('$acc','$time','登入')");
        if($arr[3]=="管理者"){
            header("location:admin.php");
        }else{
            header("location:user.php");
        }
    }
    if($_SESSION["die"]==3){
        header("location:die.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <title>登入</title>
</head>
<body>
    <form action="login.php" method="post">
    帳號<input type="text" name="acc"><br>
    密碼<input type="password" name="pas"><br>
    <img src="code.php" id="pic">
    <input type="button" id="newcode" value="更新"><br>
    驗證碼<input type="text" name="codes"><br>
    <input type="submit" value="登入">
    </form>
</body>
</html>
<script>
    $("#newcode").click(function(){
        $("#pic").attr('src','code.php');
   });
</script>