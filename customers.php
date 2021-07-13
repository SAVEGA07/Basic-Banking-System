
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
    
    <style>
        *{
    margin: 0;
    padding: 0;
  }
  body{
    background-color: #5cdb95;
  }
  
 #nav_bar{
    background-color: #379683;
    display: flex;
    flex-direction: row;
    width: 92vw;
    margin: auto;
    margin-top: 29px;
    height: 92px;
    border-radius: 7px;
    color: #edf5e1;
  }
  #img_logo{
    background: none;
  }
  .header_name{
    font-size: 38px;
    margin-left: 18px;
    margin-top: 20px;
    font-family: 'Encode Sans SC', sans-serif;
    text-decoration: underline;
  }
  #nav_icons{
    font-size: 20px;
    list-style-type: none;
    display: flex;
    margin-top: 25px;
    margin-left: 637px;
    font-family: 'Roboto', sans-serif;
    
  }
  .list_nav{
    margin: 10px;
    margin-right: 53px;
  }
  .header_name a{
            color: #edf5e1;
        }
  .list_nav a{
    text-decoration: none;
      color: #edf5e1;
   }
.bank_customers{
  font-family: 'Ubuntu', sans-serif;
  font-size: 48px;
  text-align: center;
  margin-top: 38px;
}
  .continer{
      background-color: #8ee4af;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 50px;
      border-radius: 2px;
  }
  table {
    border-collapse: collapse;
    width: 100%;
    color:black;

    font-size: 25px;
    text-align: left;
}
th{
    background-color: #379683;
}
#footer{
    text-align: center;
    background-color:lightblue ;
    width: 100%;
    position: fixed;
    bottom: 0;
  
  }
    </style>
</head>



<body>
    <header>
        <nav id="nav_bar">
            <img id="img_logo" src="images/logo2.jpg" alt="Bank logo">
            <h4 class="header_name"><a href="index.html">Sparks Bank</a></h4>
            <ul id="nav_icons">
                <li class="list_nav"><a href="index.html">Home</a></li>
                <li class="list_nav">About</li>
                <li class="list_nav">Contact Us</li>
            </ul>
        </nav>
    </header>
    <div>
    <p class="bank_customers">Bank's  Customers</p>
    </div>
    <div class="continer">
        <table>
            <tr class="row">
                <th>Sr.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Balance</th>
                <th>Details</th>
            </tr>
        <?php
        // Connecting to the Database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "sparks bank";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }


        $sql = "SELECT * FROM `customers`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
            
                
                echo "<tr>";
            echo '<form method ="post" action = "transfer_money.php">';
            echo "<td>" . $row["Acc_Number"]. "</td><td>" . $row["name"] . "</td>
            <td>" . $row["email"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["balanca"] . "</td>";
            echo "<td ><a href='transfer_money.php?user={$row["name"]}&message=no' type='button' name='customer'  id='users1' ><span>Transfer</span></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        }
        ?>
    </div>
    <footer id="footer">
        <p class="footer">
            &#169;Copyrights Sparks Bank</p>
    </footer>
</body> 
</html>