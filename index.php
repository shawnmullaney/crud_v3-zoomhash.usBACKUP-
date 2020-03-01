<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
/**
*my table is 
*div container 440X64008
* 	<link href="style.css" rel="stylesheet" type="text/css"/>
* 
* 689x63935**/
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM miners ORDER BY plocation ASC");
?>

<html>
<head>    
<link href="style2.css" rel="stylesheet" type="text/css"/>
    <title>O-Chit-Chawn</title>
</head>

<body>
	    <div class="container">
<a href="add.php">Add New Miner</a><br/><br/>
<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
    <table width='80%' border=1>

    <tr>
        <th>Miner IP</th> <th>Mac</th> <th>Miner Type</th> <th>Physical Location</th> <th>Hashrate</th> <th>Max Temp</th> <th>Farm Name</th> <th>Hash Boards</th> <th>Uptime</th> <th>Pool User</th> <th>Comments</th> <th>Edit/Delete</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {     
        echo "<tr>";
        echo "<td>".$user_data['minerIp']."</td>";
        echo "<td>".$user_data['macAddress']."</td>";
        echo "<td>".$user_data['minerType']."</td>";    
        echo "<td>".$user_data['plocation']."</td>";
        echo "<td>".$user_data['hashrate']."</td>";  
        echo "<td>".$user_data['maxTemp']."</td>";  
        echo "<td>".$user_data['farmName']."</td>";    
        echo "<td>".$user_data['numCards']."</td>";
        echo "<td>".$user_data['uptime']."</td>";  
        echo "<td>".$user_data['poolUser']."</td>";  
        echo "<td>".$user_data['comments']."</td>";  
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    </div>
</body>
</html>
