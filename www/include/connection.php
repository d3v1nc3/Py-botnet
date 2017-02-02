<?php
global $conn;
function openBD() {
    global $conn;
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "pybot";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de connexió: ".$conn->connect_error);
    }
}
function closeBD() {
    global $conn;
    $conn->close();
}
?>
