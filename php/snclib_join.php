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
 
   session_start();
   
   $id = $_POST[u_id];
   $pw = $_POST[u_pw]; 
 
   $sql = "INSERT INTO USERS(USERID, PASSWORD) VALUES('$id', '$pw')";
  
    $RESULT = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($RESULT);
   
   if(!$RESULT)
            die("mysql query error");
   else
        echo "0";
 
?>