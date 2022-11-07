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
 
  // 세션 시작
  session_start();
 
  $id = $_POST['u_id'];
  $pw = $_POST['u_pw'];

  $sql = "SELECT IF(strcmp(PASSWORD,'$pw'),0,1) pw_chk FROM USERS  WHERE USERID = '$id'";

  $result = mysqli_query($connect, $sql);

  // 쿼리 결과
  if($result)
  {
    $row = mysqli_fetch_array($result);
    if(is_null($row[pw_chk]))
    {
      echo "Can not find ID";
    }
    else
    {
      echo "$row[pw_chk]";   // 0면  , 1면 [m
    }
  }
  else
  {
   echo 1;
  }
?>

