
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table with database</title>
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
    table {
      border-collapse: collapse;
      width: 100%;
      color: black;
      font-size: 25px;
      text-align: left;
    }

    th {
      background: #8ee4af;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }
    h3{
      font-size: 40px;
      text-align: center;
      margin: 20px;
      font-family: 'Roboto', sans-serif;
      margin-top: 40px;
    }
    .card {
      /* Add shadows to create the "card" effect */
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      text-align: -webkit-center;
    }
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    /* Add some padding inside the card container */
    .container {
      padding: 20px 16px;
      margin: 40px;
      background: #8ee4af;
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

  <main>
    <table>
      <tr>
        <th>Account Number</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Balance</th>

      </tr>


      <?php
          session_start();
          $server = "localhost";
          $username = "root";
          $password = "";
          $conn = mysqli_connect($server, $username, $password, "sparks bank");
            if (!$conn) {
              die("Connection failed");
            }

          $_SESSION['user'] = $_GET['user'];
          $_SESSION['sender'] = $_SESSION['user'];
      ?>
      <?php
          if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];

            $sql = "SELECT * FROM customers WHERE Name='$user'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";

              echo "<td>" . $row["Acc_Number"] . "</td><td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["balanca"] . "</td>";

              echo "</tr>";
            
            }
          }
      ?>
    
      <div>
        <h3>Transaction Details</h3>
      </div>
      
      <div class="card container">
        <?php
        if ($_GET['message'] == 'success') {
          echo "<h3><p style='color:green;' class='messagehide'>Transaction was completed successfully</p></h3>";
        }
        if ($_GET['message'] == 'transactionDenied') {
          echo "<h3><p style='color:red;' class='messagehide'>Transaction Failed </p></h3>";
        }
        ?>
        <form action="transfer.php" method="POST">
          <!-- Make Transcation -->

          <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
          <select name="reciever" id="dropdown" class="textbox" required>
            <option>Select Recipient</option>
              <?php
              $db = mysqli_connect("localhost", "root", "", "sparks bank");
              $res = mysqli_query($db, "SELECT * FROM customers WHERE name!='$user'");
              while ($row = mysqli_fetch_array($res)) {
                echo ("<option> " . "  " . $row['name'] . "</option>");
              }
              ?>
          </select>
          <br><br>
          <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user"; ?>'></input></span>
          <br><br>


          <b>Amount :&#8377;</b>
          <input name="amount" type="number" min="100" class="textbox" required>
          <br><br>
          <a href="transfer.php"><button id="transfer" name="transfer" >Transfer</button></a>
        </form>
      </div>

      <div style="font-family: 'Gabriela', serif;   font-size: 40px;text-align: center;margin: 20px;}">
        <h3>Customer Details</h3>
      </div>
  </main>
</body>
</html>