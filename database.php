<?php

$db_name = "login";
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$conn = "";


try {
    //code...
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    //echo "Connected successfully";
} catch (\Throwable $th) {
    //throw $th;
    echo "{$th}";
}

?>