<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

// search using post method
//$data = json_decode(file_get_contents("php://input"),true); // for getting/reading data from json format.
//$search_value = $data['search'];

// search using get method
$search_value = $_GET['search'];
include 'dbcon.php';

$sql = "Select * from users where name Like '%$search_value%'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0)
{
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No Record Found','status'=>false));
}

?>