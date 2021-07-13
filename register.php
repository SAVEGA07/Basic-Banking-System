<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparks Bank/Register </title>
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
  .container{
    background-color: #379683;
    height: 600px;
    margin: 60px;
    border-radius: 6px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    border: 0px;
    
  }
  .coustomer_img{
    width: 700px;
    margin: 42px;
    border-radius: 6px;
}
  .form_filling{
  border: 0px;
    width: 613px;
    height: 573px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  .create_new_user{
    color: #edf5e1;
    text-align: center;
    font-size: 44px;
    font-family: 'Baloo Paaji 2', cursive;
  }
  .btn{
    background-color: #05386b;
    border: 2px solid #05386b;
    border-radius: 31px;
    color: #edf5e1;
    margin-top: 24px;
    width: 497px;
    height: 48px;
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
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $balance=$_POST['balance'];
        
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
        else{ 
            // Submit these to a database
            // Sql query to be executed 
            $sql =" INSERT INTO `customers` (`Acc_Number`, `name`, `email`, `gender`, `balanca`, `date/time`) VALUES (NULL, '$name', '$email', '$gender', '$balance', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            // echo "$result";

            if($result){
            echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
            <strong>Success!</strong> Your entry has been submitted successfully!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span class='errorClose' aria-hidden='true'>×</span>
            </button>
            </div>";
            }
            else{
                // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
            <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span class='errorClose' aria-hidden='true'>×</span>
            </button>
            </div>";
            }

        }

    }
    ?>
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
        <section class="form">
            <div class="container">
                <div>
                    <img src="images/coustomer_r.jpg" alt="coustomer img" class="coustomer_img">
                </div>

                <div class="form_filling">
                    <p class="create_new_user">
                        Create New User
                    </p>
                    <form action="register.php" method="post">
                        <div id="name_btn">
                            <input type="text" name="name" class="btn" placeholder="Username">
                        </div>
                        <div id="email_btn">
                            <input name="email" type="email" class="btn" placeholder="Email">
                        </div>
                        <div id="gender_btn">
                            <select name="gender" class="btn" aria-label="Default select example">
                                <option selected>Select Gender</option>
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                            </select>
                        </div>
                        <div id="balance_btn">
                            <input id="balance" name="balance" type="text" class="btn" placeholder="Balance">
                        </div>
                        <div id="submit_btn">
                            <button type="submit" class="btn">SUBMIT</BUTTON>
                        </div>
                    </form>
                </div>
        </section>
    </main>
    <footer id="footer">
        <p class="footer">
            &#169;Copyrights Sparks Bank</p>
    </footer>
</body>


</html>
<!-- INSERT INTO `customers` (`S.no`, `name`, `email`, `gender`, `balanca`, `date/time`) 
    VALUES (NULL, 'R Chetan kumar', 'Chetans@gmail.com', 'male', '100000', current_timestamp()); -->