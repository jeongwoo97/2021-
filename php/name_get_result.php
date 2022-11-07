<?php
  
header('content-type: text/html; charset=utf-8'); 
     $conn = mysqli_connect(
    '54.180.157.80',
    'king',
    'kingjw',
    'pill_info',
    '9876'
    );
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

mysqli_query("SET NAMES UTF8");

session_start();

$id = $_POST[mark];

$sql = "SELECT name, img_path FROM pill_information WHERE name LIKE '%$id%'";

$result = mysqli_query($connect,$sql);

$data = array();

if($result){

    while($row=mysqli_fetch_array($result)){
        array_push($data,
            array('pill_name'=>$row['name'],
            'img'=>$row['img_path'] ));
    }

    header('Content-Type: application/json; charset=utf8');
    $json = json_encode(array("user_result"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    echo $json;

}
else{
    echo "SQL error : ";
    echo mysqli_error($connect);
}
?>