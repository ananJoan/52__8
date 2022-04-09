<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an52th8");
mysqli_query($db,"SET NAMES UTF8");
$user=$_SESSION["user"];
$_SESSION["user"]=$user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工作管理</title>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <style>
        table{
            border-collapse: collapse;
        }
        tr{
            height: 50px;
        }
    </style>
</head>
<body>
<div title="修改/刪除工作" id="fd">
<input type="button" value="修改" class="fixes">
<input type="button" value="刪除" class="deles">
</div>
<div title="新增工作" id="news">
    <form action="newwork.php" method="post">
        名稱<input type="text" name="works"><br>
        內容<input type="text" name="content"><br>
        <select name="nows">
            <option value="未處理">未處理</option>
            <option value="處理中">處理中</option>
            <option value="已處理">已處理</option>
        </select><br>
        <select name="types">
            <option value="普通件">普通件</option>
            <option value="速件">速件</option>
            <option value="最速件">最速件</option>
        </select><br>
        <select name="starts">
        <option value="1">1</option><option value="2">2</option>
        <option value="3">3</option><option value="4">4</option>
        <option value="5">5</option><option value="6">6</option>
        <option value="7">7</option><option value="8">8</option>
        <option value="9">9</option><option value="10">10</option>
        <option value="11">11</option><option value="12">12</option>
        <option value="13">13</option><option value="14">14</option>
        <option value="15">15</option><option value="16">16</option>
        <option value="17">17</option><option value="18">18</option>
        <option value="19">19</option><option value="20">20</option>
        <option value="21">21</option><option value="22">22</option>
        <option value="23">23</option><option value="24">24</option>
        </select>~
        <select name="ends">
        <option value="1">1</option><option value="2">2</option>
        <option value="3">3</option><option value="4">4</option>
        <option value="5">5</option><option value="6">6</option>
        <option value="7">7</option><option value="8">8</option>
        <option value="9">9</option><option value="10">10</option>
        <option value="11">11</option><option value="12">12</option>
        <option value="13">13</option><option value="14">14</option>
        <option value="15">15</option><option value="16">16</option>
        <option value="17">17</option><option value="18">18</option>
        <option value="19">19</option><option value="20">20</option>
        <option value="21">21</option><option value="22">22</option>
        <option value="23">23</option><option value="24">24</option>
        </select><br>
        <input type="submit" value="確認">
    </form>
    </div>
    <div title="修改工作" id="fixs">
    <form action="fixwork.php" method="post">
    <input type="text" name="id" id="id"><br>
    名稱<input type="text" name="works" id="works"><br>
        內容<input type="text" name="content" id="content"><br>
        <select name="nows" id="nows">
            <option value="未處理">未處理</option>
            <option value="處理中">處理中</option>
            <option value="已處理">已處理</option>
        </select><br>
        <select name="types" id="types">
            <option value="普通件">普通件</option>
            <option value="速件">速件</option>
            <option value="最速件">最速件</option>
        </select><br>
        <select name="starts" id="starts">
        <option value="1">1</option><option value="2">2</option>
        <option value="3">3</option><option value="4">4</option>
        <option value="5">5</option><option value="6">6</option>
        <option value="7">7</option><option value="8">8</option>
        <option value="9">9</option><option value="10">10</option>
        <option value="11">11</option><option value="12">12</option>
        <option value="13">13</option><option value="14">14</option>
        <option value="15">15</option><option value="16">16</option>
        <option value="17">17</option><option value="18">18</option>
        <option value="19">19</option><option value="20">20</option>
        <option value="21">21</option><option value="22">22</option>
        <option value="23">23</option><option value="24">24</option>
        </select>~
        <select name="ends" id="ends">
        <option value="1">1</option><option value="2">2</option>
        <option value="3">3</option><option value="4">4</option>
        <option value="5">5</option><option value="6">6</option>
        <option value="7">7</option><option value="8">8</option>
        <option value="9">9</option><option value="10">10</option>
        <option value="11">11</option><option value="12">12</option>
        <option value="13">13</option><option value="14">14</option>
        <option value="15">15</option><option value="16">16</option>
        <option value="17">17</option><option value="18">18</option>
        <option value="19">19</option><option value="20">20</option>
        <option value="21">21</option><option value="22">22</option>
        <option value="23">23</option><option value="24">24</option>
        </select><br>
        <input type="submit" value="確認">
    </form>
    </div>
    <input type="button" value="新增" id="new"><input type="button" value="登出" id="out">
    <table border="1" id="desk">
        <tr>
            <th>時間</th>
            <th>工作項目</th>
        </tr>
        
    </table>
</body>
</html>
<script>
for(i=0;i<=22;i+=2){
    i2=i+1;
    $("#desk").append(`
    <tr>
        <td>`+i+`~`+(i2+1)+`</td>
        <td>
        <div style="width:500px; height:25px;" id="works`+i+`"></div>
        <div style="width:500px; height:25px;" id="works`+i2+`"></div>
        </td>
    </tr>
    `);
}
shows();
    function shows(){
        $(".korw").remove();
        $.post({
            url:'worksearch.php',
            success:function(e){
                n=e.split("#");
                n.pop();
                for(i=0;i<n.length;i++){
                    $rr=JSON.parse(n[i]);
                    $sta=$rr[3];
                    $end=$rr[4];
                    $oh=$end-$sta;
                    $("#works"+$sta+"").append(`
                    <div style="width:100px; height:`+(25*$oh)+`px; background-color:orange;" id="work`+$rr[7]+`" class="korw">
                    `+$rr[0]+`<br>
                    `+$rr[3]+`~`+$rr[4]+`<br>
                    `+$rr[1]+`,`+$rr[2]+`<br>
                    `+$rr[5]+`
                    </div>
                    `);
                    $("#work"+$rr[7]+"").data('id',$rr[7]);
                    $("#work"+$rr[7]+"").data('start',$rr[3]);
                    $("#work"+$rr[7]+"").css('left',parseInt($rr[6]));
                }
                $(".korw").draggable({
                    grid:[1,25],
                    stop:function(e){
                        $start=$(e.target).data("start");
                        $start2=parseInt(parseInt($(e.target).css("top")+50)/25);
                        $start2=parseInt($start2)+parseInt($start);
                        $.post({
                            url:'dragwork.php',
                            data:{
                                id:$(e.target).data('id'),
                                start:$start2,
                                offleft:$(e.target).css('left'),
                            },
                            success:function(e){
                                shows();
                            }
                        });
                    }
                });
            }
        });
    }
                    
    $(".fixes").click(function(){
    $id=$(this).data('id');
    $.post({
        url:'workfixsearch.php',
        data:{
            id:$id
        },
        success:function(e){
            $("#fixs").dialog('open');
            $("#id").val($id);
            n=e.split("#");
            n.pop();
            $rr=JSON.parse(n[0]);
            $("#works").val($rr[0]);
            $("#content").val($rr[5]);
            $("#nows").val($rr[1]);
            $("#types").val($rr[2]);
            $("#starts").val($rr[3]);
            $("#ends").val($rr[4]);
            $("#id").hide();
        }
    });
});
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
$("#fd").dialog({
    autoOpen:false
});
$('body').on("click",".korw",function(){    
    $id=$(this).attr('id').substr(4);
    $("#fd").dialog('open');
    $(".fixes").data('id',$id)
    $(".deles").data('id',$id)
});
$(".deles").click(function(){
    $id=$(".deles").data('id')
    window.location.href="delwork.php?id="+$id+"";
});
</script>