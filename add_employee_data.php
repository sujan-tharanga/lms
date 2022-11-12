<?php
require 'connection/connection.php';
$errors = [];var_dump($_POST);die();
$data = [];
$fName = $_POST['fname'];
$lName = $_POST['lname'];
$approver = $_POST['approver'];
$pleave = $_POST['pleave'];
$sleave = $_POST['sleave'];

if (empty($fName)) {
    $errors['fName'] = 'First Name is required.';
}

if (empty($lName)) {
    $errors['lName'] = 'Last Name is required.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $connection = new Connection();
    $conn = $connection->getConnection();
    if($conn != null){
        $sql = "INSERT INTO employee (first_name, last_name, manager_id)
                VALUES (" . $fName . ", " . $lName . ", " . $approver . ")";
        if ($conn->query($sql) === TRUE) {
            $lastId = $conn->insert_id;
            $sql2 = "INSERT INTO leave_entitlement (ref_emp_id, ref_leave_type_id, entitlement)
                VALUES (" . $lastId . ", " . $lName . ", " . $approver . ")";
            $sql2 .= "INSERT INTO leave_entitlement (ref_emp_id, ref_leave_type_id, entitlement)
            VALUES (" . $lastId . ", " . $lName . ", " . $approver . ")";    

            if ($conn->multi_query($sql2) === TRUE) {
                $data['success'] = true;
                $data['message'] = 'Success!';
                header("Location: manage_leave.php");
            }           
        }else{
            $errors['error'] = 'Connection Error.';
            $data['success'] = false;
            $data['errors'] = $errors;
        }
    }
    
}

//echo json_encode($data);

?>
