<?php
include("include/connection.php");

if(isset($_POST["user"])){
	$username = $_POST["user"];
	$pass = $_POST["password"];
	$hashed_pass = sha1($pass);

	openBD();
	$sql_prepared = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
	$sql_prepared->bind_param("ss", $username, $hashed_pass);
	$sql_prepared->execute();
	$result = $sql_prepared->get_result();
	if ($result->num_rows > 0){
		session_start();
		header("Location: app.php");
		$_SESSION["ifuser"]=$username;
	}else{
		header("Location: index.html");
		$conn->close();
	}
}
?>