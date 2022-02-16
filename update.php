<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
// X-Requested-With (for ajax optional)

$data = json_decode(file_get_contents("php://input"),true); // for getting/reading data from json format.

$id = $data['id'];
$name = $data['name'];
$password = $data['password'];
$user_type = $data['user_type'];

include 'dbcon.php';

$sql = "Update users SET name = '$name',password='$password',user_type='$user_type' Where id = '$id' ";
if(mysqli_query($con,$sql))
{
    echo json_encode(array('message'=>'Record Successfully Updated','status'=>true));
}else{
    echo json_encode(array('message'=>'Failed To Update Record','status'=>false));
}

?>