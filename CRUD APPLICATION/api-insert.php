<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Headers, X-Requested-with, Authorization');

include "connection/config.php";

$data = json_decode(file_get_contents("php://input"), true);

$student_name = $data['Sname'];
$student_age = $data['Sage'];
$student_Email = $data['Semail'];

$sql = "INSERT INTO student_information(`Full_Name`, `Age`, `Email`)  VALUES('$student_name','$student_age','$student_Email')";



if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => ' Record Successfully Add', 'status' => true));

} else {
    echo json_encode(array('message' => 'no Record Found', 'status' => false));
}
