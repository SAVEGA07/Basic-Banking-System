
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
</head>
<body>
<script src="jquery.min.js" type="text/javascript"></script>
	<script src="popper.min.js" type="text/javascript"></script>
	<script src="sweetalert.min.js" type="text/javascript"></script>
  <?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"sparks bank");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_SESSION['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];
}
?>

<?php

$sql = "SELECT balanca FROM customers WHERE name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
          while($row = $result->fetch_assoc()) {
 if($amount>$row["balanca"] or $row["balanca"]-$amount<100){
  $location='transfer_money.php?user='.$sender;
  header("Location: $location&message=transactionDenied");
 }
else{
    $sql = "UPDATE `customers` SET balanca=(balanca-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error in updating record: " . $conn->error;
}
 }
 
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `customers` SET balanca=(balanca+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error in updating record: " . $con->error;
}
}
if($flag==true){
    $sql = "SELECT * from customers where name='$sender'";
    $result = $con-> query($sql);
    while($row = $result->fetch_assoc())
     {
         $s_acc=$row['Acc_Number'];
 }
//  Transcation DEatiled Stored in the DB

 $sql = "SELECT * from customers where name='$receiver'";
 $result = $con-> query($sql);
 while($row = $result->fetch_assoc())
  {
      $r_acc=$row['Acc_Number'];
}        
$sql = "INSERT INTO `transfer`(s_name,s_acc_no,r_name,r_acc_no,amount) VALUES ('$sender','$s_acc','$receiver','$r_acc','$amount')";
if ($con->query($sql) === TRUE) {
} else 
{
  echo "Error updating record: " . $con->error;
}
}

if($flag==true){
  $location='transfer_money.php?user='.$sender;
  header("Location: $location&message=success");//for redirecting it to detail page with message
}
?>

    </body>
</html>
