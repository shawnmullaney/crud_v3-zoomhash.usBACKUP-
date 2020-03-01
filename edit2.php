<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];

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

	// update user data
	$result = mysqli_query($mysqli, "UPDATE miners SET minerIp='$minerIp',macAddress='$macAddress',minerType='$minerType',plocation='$plocation',hashrate='$hashrate',maxTemp='$maxTemp',farmName='$farmName',numCards='$numCards',uptime='$uptime',poolUser='$poolUser',comments='$comments' WHERE id=$id");

	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM miners WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$minerIp = $user_data['minerIp'];
	$macAddress = $user_data['macAddress'];
	$minerType = $user_data['minerType'];
	$plocation = $user_data['plocation'];
	$hashrate = $user_data['hashrate'];
	$maxTemp = $user_data['maxTemp'];
	$farmName = $user_data['farmName'];
	$numCards = $user_data['numCards'];
	$uptime = $user_data['uptime'];
	$poolUser = $user_data['poolUser'];
	$comments = $user_data['comments'];
}
?>
<html>
<head>	
	<title>Edit Miner Data</title>
	<link href="style2.css" rel="stylesheet" type="text/css"/>
</head>

<body>
		    <div class="container">
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Miner IP</td>
				<td><input type="text" name="minerIp" value=<?php echo $minerIp;?>></td>
			</tr>
			<tr> 
				<td>Hashrate</td>
				<td><input type="text" name="hashrate" value=<?php echo $hashrate;?>></td>
			</tr>
			<tr> 
				<td>Max Temp</td>
				<td><input type="text" name="maxTemp" value=<?php echo $maxTemp;?>></td>
			</tr>
			<tr> 
				<td>Hash Boards</td>
				<td><input type="text" name="numCards" value=<?php echo $numCards;?>></td>
			</tr>
			<tr> 
				<td>Uptime</td>
				<td><input type="text" name="uptime" value=<?php echo $uptime;?>></td>
			</tr>
			<tr> 
				<td>Pool User</td>
				<td><input type="text" name="poolUser" value=<?php echo $poolUser;?>></td>
			</tr>

			<tr> 
				<td>Comments</td>
				<td><input type="text" name="comments" value=<?php echo $comments;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>

