<?php
  
     header('content-type: text/html; charset=utf-8'); 
     $conn = mysqli_connect(
    '54.180.157.80',
    'king',
    'kingjw',
    'userinfo',
    '9876'
    );
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }
 

mysqli_query("SET NAMES UTF8");

session_start();

$id = $_POST[u_id];
$nick = $_POST[u_nick];
$pill_name = $_POST[pill_name];
$img_path = $_POST[img_path];



$sql = "INSERT INTO pill(user_id, pill_name,pill_nickname,img) VALUES('$id','$pill_name','$nick','$img_path')";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
echo "0";

?>