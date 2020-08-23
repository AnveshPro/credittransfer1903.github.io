<?php
session_start();
$_SESSION['a1'] = $_POST['name1'];
$_SESSION['a2'] = $_POST['name2'];
$_SESSION["a3"] = $_POST['quantity'];
?> 

<!doctype html>
<html>
<head>
<style>
body{
	background-color: lightblue;
}
</style>
</head>
<body>
<form method = "post" action="">

</form>

	<h2>Transaction Result</h2>
</body>
</html>
	<?php 
	$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "Task1"; 
$transaction_query="";
$con3 = new mysqli($servername, $username, $password, $dbname);
if ($con3->connect_error) {
    die("Connection failed: " . $con3->connect_error);
}
$name1=$_SESSION['a1'];
$name2=$_SESSION["a2"];
$credit1=$_SESSION["a3"]; 
$deduct_query = "UPDATE users SET totalcredit = totalcredit -'$credit1' where name  = '$name1' and totalcredit-'$credit1'>-1 " ; 
$tc ="select totalcredit from users where name = '$name1'";
$tc1 = mysqli_query($con3,$tc);
$row = mysqli_fetch_array($tc1);
$var1 = $row['totalcredit'];

if($var1>= $credit1){ 
$add_query = "UPDATE users SET totalcredit = totalcredit+'$credit1' where name  = '$name2'";

$transaction_query = "insert into transactions values('$name1','$name2','$credit1')";
if($con3->query($deduct_query) === TRUE && $con3->query($add_query) === TRUE && $con3->query($transaction_query)===TRUE){
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con3->error;
} 
}
else{
	echo '<script> window.alert("Insufficient Balance") </script>';
	echo 'unable to update the record';
}
$con3->close(); 

?>

<a href = "index.php"><p style = "text-align: right"><b>HOME</b></p></a>


	
	
	
</body>
</html>



