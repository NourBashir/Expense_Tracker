<link rel="stylesheet" href="css/style.css">
  <title>Home page</title>
<header role="banner">
  <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
  <div class="topnav">
    <a class="active" href="home.php">Home</a>
    <a href="about_us.php">About us</a>
    <a href="all_category.php"> Categore</a>
    <a href="expenses.php">Expenses</a>
    <a href="add_expense.php">add Expenses</a>
    <a href="search.php">search expense</a>

    <?php
      include('conn.php');

     session_start();

      // Check if user is logged in
    if(isset($_SESSION['User_Id']))
    {?>
    <a href="info.php">Personal Information</a>
    <a href="logout.php">logout</a>

    <?php
     $User_Id = $_SESSION['User_Id'];

    $First_Name = $_SESSION['First_name'];

   ?> <h1 id="myDIV2" style="color:white;font-size:40px" align="center"><?php  echo "Hello $First_Name"; ?></h1><br>
<?php
    } else {?>
      <a href="login.php">Login</a>
      <a href="signup.php">Sign up</a>

      <?php 
    }
  ?>
  </div>
</header><!-- header role="banner" -->
<body>
  <div
    style="background-image: url('images/11.jpg'); filter: blur(8px);-webkit-filter: blur(2px);height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;  ">
  </div>
  <div class="bg-text">
    <h1 style="font-size:70px" id="myDIV1">Welcome</h1>
    <p id="myDIV1">To My Expense Tracker Website..!</p>
  </div>
  <footer>
    <div style="background-color: #3f3961; width:100%; height: 20px;">
      <p align="left" style="color:white;">Author: Nour Bashir &nbsp;&nbsp; <a href="http://www.gmail.com/"><img
            src="images/gmail.png" alt="Avatar" class="avatar"></a>
        <a href="http://www.facebook.com/"><img src="images/Facebook_Logo_(2019).png" alt="Avatar" class="avatar"></a>
        <a href="http://www.instagram.com/"><img src="images/insta.png" alt="Avatar" class="avatar"></a></p>
    </div>
  </footer>
</body>