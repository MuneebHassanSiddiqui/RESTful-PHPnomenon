<?php
include "connection/config.php";

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-type,Access-Control-Allow-Headers,Authorization,X-Requested-with');



$data = json_decode(file_get_contents("php://input"), true);


$student_id = $data['Stu_id'];
$student_Name = $data['Sname'];
$student_Age = $data['Sage'];
$student_Email = $data['Semail'];

$mySql = "UPDATE student_information SET Full_Name = '$student_Name' , Age = $student_Age,
Email = '$student_Email' WHERE id = $student_id ";


if (mysqli_query($conn, $mySql)) {
    echo json_encode(array('mesasge' => 'Record Updated!', 'status' => true));
} else {
    echo json_encode(array('mesasge' => 'Record Can not Updated.....', 'status' => false));
}
