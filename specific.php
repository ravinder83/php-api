<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

include 'dbcon.php';

$data = json_decode(file_get_contents("php://input"),true); // for getting/reading data from json format.

$id = $data['sid'];
// $id = $_GET['id'];
$sql = "Select * from users where id = '$id'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0)
{
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No Record Found','status'=>false));
}

?>  