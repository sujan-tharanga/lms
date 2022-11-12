<?php

class Connection{

private $server = "localhost";
private $username = "root";
private $password = "";
private $database = "lms";

public function getConnection(){
    $conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
    if ($conn->connect_error) {
        return null;
    }else{
        return $conn;
    }
}

}
?>