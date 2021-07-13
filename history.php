<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transtion History</title>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@500&family=Roboto&family=Ubuntu&display=swap" rel="stylesheet">

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
        h3{
            font-size: 40px;
            text-align: center;
            margin: 20px;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            margin: 60px;
            background-color: #8ee4af;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            color:black;
            font-size: 25px;
            text-align: left;
        }
        th {
            background-color:#379683;
            color: #edf5e1;
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
    <div >
        <h3>Transaction History</h3>
    </div>
    <div class="container">
        <table>
        <tr>
        <th>Sender's Name</th>
        <th>Sender's Account</th>
        <th>Reciever's Name</th>
        <th>Reciever's Account </th>
        <th>Amount</th>
        <th>Date and Time</th>
        </tr>
    </div>

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


        $sql = "SELECT * FROM `transfer`";
        $result = mysqli_query($conn, $sql);

        // Find the number of records returned
        $num = mysqli_num_rows($result);

        // Display the rows returned by the sql query
        if($num> 0){
            

            // We can fetch in a better way using the while loop
            while($row = mysqli_fetch_assoc($result)){
                // echo var_dump($row);
                echo "<tr>";
                echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td>
                <td>" . $row["r_name"] . "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["date/time"] . "</td>";
                 echo "</tr>";
        }
        echo "</table>";
        }
    ?>

</body>
</html>