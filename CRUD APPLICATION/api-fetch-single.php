<?php

header('Content-Type: application/json');

header('Access-Control-Allow-Origin: *');

include "connection/config.php";

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['Stu_id'];

$sql = "SELECT * FROM student_information WHERE id = $student_id";
$res = mysqli_query($conn, $sql) or die('Query Unsuccessfull!');

if (mysqli_num_rows($res) > 0) {
    $Fetch_data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo json_encode($Fetch_data);
} else {
    echo json_encode(array('message' => 'no Record Found', 'status' => false));
}
