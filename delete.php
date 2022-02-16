<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization');
// X-Requested-With (for ajax optional)

$data = json_decode(file_get_contents("php://input"),true); // for getting/reading data from json format.

$userid = $data['userid'];

include 'dbcon.php';

$sql = "Delete from users Where id = '$userid' ";
if(mysqli_query($con,$sql))
{
    echo json_encode(array('message'=>'Record Deleted','status'=>true));
}else{
    echo json_encode(array('message'=>'Failed To Delete Record','status'=>false));
}

?>