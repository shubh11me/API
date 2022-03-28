<?php
header('Content-Type: application/json');

header("Access-Control-Allow-Origin: *");

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include '../conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {    # code...

$data = json_decode(file_get_contents('php://input'),true);
    $fname = $data['fname'];
    // $fname = $data->fname;
    $lname = $data['lname'];
// echo $fname."<br>";
// echo $lname."<br>";


if (!empty($fname) && !empty($lname)) {
    # code...

    $res = mysqli_query($conn, "INSERT INTO `mad_user` ( `fname`, `lname`) VALUES ('$fname', '$lname')");
    if ($res) {
        http_response_code(201);
        echo json_encode(array("status" => true, "message" => "Student registered"));
    } else {
        http_response_code(403);
        echo json_encode(array("status" => false, "message" => "Student not registered"));
    }
}else{
    http_response_code(403);
  echo json_encode(array("status"=>"false","message"=>"In approtiate data"));
}
}
?>