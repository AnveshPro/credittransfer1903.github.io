<?php
session_start();
?> 
<!DOCTYPE html>
<html>
<head>
<style>
	body{
		background-color: lightblue;
		opacity: 1.2;
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
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "Task1"; 
$quantity="";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT name, email, totalcredit FROM Users";
$result = $con->query($sql);

if ($result->num_rows > 0) {
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

echo "<br><br>";


$conn1 = new mysqli('localhost', 'root', 'student', 'Task1') 
or die ('Cannot connect to db');

    $result1 = $conn1->query("select name from users");

    $conn2 = new mysqli('localhost', 'root', 'student', 'Task1') 
or die ('Cannot connect to db');

    $result2 = $conn2->query("select name from users");

echo'<form action="sendamount.php" method="post">';
echo "<p>SENDER - </p>";

echo "<select name='name1'>";

    while ($row = $result1->fetch_assoc()) {

                  unset($name);
                  $name1 = $row['name']; 
                  echo '<option value="'.$name1.'">'.$name1.'</option>';
}

    echo "</select>";
   echo "<br> <br> <br> <br> <br>";



   
 echo'<label for="quantity">credittransfer (greater than zero):</label>"';
 echo' <input type="number" id="quantity" name="quantity" min="1">"';
 



 echo "<br> <br> <br> <br> <br>";
echo "<p>RECEIVER - </p>";
echo "<select name='name2'>";

    while ($row = $result2->fetch_assoc()) {

                  unset($name2);
                  $name2 = $row['name']; 
                  echo '<option value="'.$name2.'">'.$name2.'</option>';
}


    echo "</select>";
echo "<br> <br> <br> <br>"; 

     echo'<center><input type="submit" value="Send"></center>';

   echo'</form>';
?>
<?php
// Set session variables
$_SESSION["a1"] = " '.$name1.' ";
$_SESSION["a2"] = " '.$name2.' ";
$_SESSION["a3"] = " '.$quantity.' ";

//echo "Session variables are set.";

?>
<a href = "index.php"><p style = "text-align: right"><b>HOME</b></p></a>

</body>
</html>


