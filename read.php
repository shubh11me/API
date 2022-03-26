<?php
header('Content-Type: application/json');

header("Access-Control-Allow-Origin: *");

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include '../conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {    # code...

$res = mysqli_query($conn, "SELECT * FROM mad_user");

$result=mysqli_fetch_all($res,MYSQLI_ASSOC);
echo json_encode(array("status" => true, "message" => "Student found","data"=>$result));
}
?>