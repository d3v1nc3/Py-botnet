<?php	session_start();
	if ($_SESSION["ifuser"]=="") {
		header("Location:index.html");
	} ?>
