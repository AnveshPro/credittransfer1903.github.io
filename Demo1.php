<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			letter-spacing: 3px;
			font-family: verdana;
		}
		h1{
			background-color: black;
			color:white;
			font-style: italic;
			font-family: monaco;
		} 
		a{
			background-color: DodgerBlue;
			color:white;
			text-shadow: none;
			letter-spacing: 2px;
		}
		table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
	</style>
<body>
<h1>USER DETAILS:</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "Task1";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT name, email, totalcredit FROM Users";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row 
    echo "<table>";
    echo "<tr>"; 
    echo "<th>NAME</th> <th>EMAIL</th> <th>TOTAL CREDIT</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
    	echo"<tr>";
        echo "<td>".$row["name"]."</td>"."<td>". $row["email"]."</td>"."<td>".$row["totalcredit"]."</td>";
        echo"</tr>";
    }
    echo "</table>";
} 
else {
    echo "0 results";
}
//$conn->close();
?>
<a href = "index.php"><p style="text-align: right; color:black;"><b>HOME</b></p></a>

</body>
</html>