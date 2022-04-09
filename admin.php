<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$_SESSION["user"]=$_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>帳號管理</title>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div title="新增帳號" id="news">
    <form action="newuser.php" method="post">
        帳號<input type="text" name="acc"><br>
        密碼<input type="text" name="pas"><br>
        權限<input type="text" name="type"><br>
        <input type="submit" value="確認">
    </form>
    </div>
    <div title="修改帳號" id="fixs">
    <form action="fixuser.php" method="post">
        <input type="text" name="id" id="id"><br>
        密碼<input type="text" name="pas" id="pas"><br>
        權限<input type="text" name="type" id="type"><br>
        <input type="submit" value="確認">
    </form>
    </div>
    <input type="button" value="新增" id="new"><input type="button" value="登出" id="out">
    <table border="1">
        <tr>
            <th>帳號</th>
            <th>密碼</th>
            <th>權限</th>
            <th>時間</th>
            <th>修改</th>
            <th>刪除</th>
        </tr>
        <?php
            $row=mysqli_query($db,"SELECT * FROM `adminuser`");
            while($arr=mysqli_fetch_array($row)){
                echo "
                    <tr>
                        <td>$arr[1]</td>
                        <td>$arr[2]</td>
                        <td>$arr[3]</td>
                        <td><a href='time.php?id=$arr[1]'>時間</a></td>
                        <td><input type='button' value='修改' class='fixes' id='fix$arr[0]'></td>
                        <td><a href='deluser.php?id=$arr[1]'>刪除</a></td>
                    </tr>
                ";
            }
        ?>
    </table>
</body>
</html>
<script>
$("#out").click(function(){
    window.location.href="outuser.php";
});
$("#news").dialog({
    autoOpen:false
});
$("#new").click(function(){
    $("#news").dialog('open');
});
$("#fixs").dialog({
    autoOpen:false
});
$(".fixes").click(function(){
    $id=$(this).attr('id').substr(3);
    $.post({
        url:'usersearch.php',
        data:{
            id:$id
        },
        success:function(e){
            $("#fixs").dialog('open');
            $("#id").val($id);
            n=e.split("#");
            n.pop();
            $rr=JSON.parse(n[0]);
            $("#pas").val($rr[0]);
            $("#type").val($rr[1]);
            $("#id").hide();
        }
    });
});
</script>