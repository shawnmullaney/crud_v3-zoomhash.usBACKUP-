<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<html>
<head>
	<title>Add Miners</title>    
	<link href="style2.css" rel="stylesheet" type="text/css"/>
</head>

<body>
		    <div class="container">
	<a href="index.php">Go to Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Miner IP</td>
				<td><input type="text" name="minerIp"></td>
			</tr>
			<tr> 
				<td>Mac</td>
				<td><input type="text" name="macAddress"></td>
			</tr>
			<tr> 
				<td>Type</td>
				<td><input type="text" name="minerType"></td>
			</tr>
			<tr> 
				<td>Physical Location</td>
				<td><input type="text" name="plocation"></td>
			</tr>
			<tr> 
				<td>Hashrate</td>
				<td><input type="text" name="hashrate"></td>
			</tr>
			<tr> 
				<td>Max Temp</td>
				<td><input type="text" name="maxTemp"></td>
			</tr>
			<tr> 
				<td>Farm Name</td>
				<td><input type="text" name="farmName"></td>
			</tr>
			<tr> 
				<td>Hash Boards</td>
				<td><input type="text" name="numCards"></td>
			</tr>
			<tr> 
				<td>Uptime</td>
				<td><input type="text" name="uptime"></td>
			</tr>
			<tr> 
				<td>Pool User</td>
				<td><input type="text" name="poolUser"></td>
			</tr>
			<tr> 
				<td>Comments</td>
				<td><input type="text" name="comments"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php

	// Check If form submitted, insert form data into miners table.
	if(isset($_POST['Submit'])) {
		$minerIp = $_POST['minerIp'];
		$macAddress = $_POST['macAddress'];
		$minerType = $_POST['minerType'];
		$plocation = $_POST['plocation'];
		$hashrate = $_POST['hashrate'];
		$maxTemp = $_POST['maxTemp'];
		$farmName = $_POST['farmName'];
		$numCards = $_POST['numCards'];
		$uptime = $_POST['uptime'];
		$poolUser = $_POST['poolUser'];
		$comments = $_POST['comments'];
		$comments = '"'.$comments.'"';
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO miners(minerIp,macAddress,minerType,plocation,hashrate,maxTemp,farmName,numCards,uptime,poolUser,comments) VALUES('$minerIp','$macAddress','$minerType','$plocation','$hashrate','$maxTemp','$farmName','$numCards','$uptime','$poolUser','$comments')");
		
		// Show message when user added
		echo "Miner added successfully. <a href='index.php'>View Miners</a>";
	}
	?>
</body>
</html>
