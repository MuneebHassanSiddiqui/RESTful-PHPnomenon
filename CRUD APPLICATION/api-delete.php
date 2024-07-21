<?php
include "connection/config.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['Stu_id'])) {
    echo json_encode(array("message" => "Student ID required", "status" => false));
    exit();
}

$student_id = $data['Stu_id'];

$mySql = "DELETE FROM student_information WHERE id = $student_id";

if (mysqli_query($conn, $mySql)) {
    echo json_encode(array("message" => "Record deleted Successfully✔", "status" => true));
} else {
    echo json_encode(array("message" => "Record not deleted", "status" => false));
}

