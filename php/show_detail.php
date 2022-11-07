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

$id = $_POST[pill];

$sql = "SELECT name,ingredient,efficiency,capacity,company,warning FROM pill_information WHERE name = '$id'";

$result = mysqli_query($connect,$sql);

$data = array();

if($result){

    while($row=mysqli_fetch_array($result)){
        array_push($data,
            array('name'=>$row['name'], 'ingredient'=>$row['ingredient'],'efficiency'=>$row['efficiency'],'capacity'=>$row['capacity'], 'company'=>$row['company'],'warning'=>$row['warning'] ));
    }

    header('Content-Type: application/json; charset=utf8');
    $json = json_encode(array("detail_info"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    echo $json;

}
else{
    echo "SQL error : ";
    echo mysqli_error($connect);
}
?>