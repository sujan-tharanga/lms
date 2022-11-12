<?php
require 'connection/connection.php';
$errors = [];//var_dump($_POST);die();
$data = [];
$userName = $_POST['username'];
$password = $_POST['password'];

if (empty($userName)) {
    $errors['username'] = 'User Name is required.';
}

if (empty($password)) {
    $errors['password'] = 'Password is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $connection = new Connection();
    $conn = $connection->getConnection();
    if($conn != null){
        $sql = "SELECT * FROM user WHERE user_name = '" . $userName . "' AND password = '" . $password . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();
            session_start();
            $_SESSION["user"] = $userData['user_name'];
            $_SESSION["usertype"] = $userData['ref_user_type_id'];
            $data['success'] = true;
            $data['message'] = 'Success!';
            header("Location: leave.php");
        }else{
            $errors['username'] = 'User Name mismatch.';
            $errors['password'] = 'Password mismatch.';
            $data['success'] = false;
            $data['errors'] = $errors;
        }
    }
    
}

//echo json_encode($data);

?>
