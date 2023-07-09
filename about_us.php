<link rel="stylesheet" href="css/style.css">
<title>About Us</title>
<header role="banner">
  <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
  <div class="topnav">
    <a class="active" href="home.php">Home</a>
    <a href="about_us.php">About us</a>
    
    <a href="all_category.php">Categore</a>
    <a href="#">Reports</a>
    <a href="#">search</a>
    <?php
    session_start();

      include('conn.php');
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
   } else {
    header("location:login.php");
    ?>
     <a href="login.php">Login</a>
     <a href="signup.php">Sign up</a>

     <?php 
   }
 ?>
  </div>
</header><!-- header role="banner" -->

<body>
  <div
    style=" background-color:#28224618;padding:60px;background-image: url('images/1.jpg'); background-repeat: no-repeat;background-size: cover; ">
    <img align="right" id="logo-main" src="images/t.jpg" width="500" height="455">
    <h1 id="myDIV2" style="color:white;font-size:50px">About Us</h1><br>
    <h4 style="color: #3f3961;">Welcome to our expense tracker website!<br> We are a team of passionate individuals who
      understand the importance of managing finances effectively.<br> Our mission is to provide you with a user-friendly
      platform <br>that simplifies the process of tracking your expenses and helps you achieve your financial goals.<br>
      Our journey began when we realized how difficult it can be to keep track of expenses,<br> especially when dealing
      with multiple accounts and payment methods. <br> We wanted to create a solution that would make it easy<br> for
      anyone to monitor their spending, save money, and plan for the future.<br>
      Our team consists of experienced developers, designers, and financial experts who<br> have worked tirelessly to
      create an expense tracker that meets the needs of our users.<br> We have incorporated advanced features such as
      automatic categorization, <br>budget tracking, and real-time notifications to ensure that you stay on top of your
      finances at all times.<br>
      We believe in transparency and honesty,<br> which is why we have designed our website with simplicity in mind.<br>
      Our goal is to provide you with a hassle-free experience <br>that allows you to focus on what matters most –
      achieving your financial goals.<br>
      We are committed to providing exceptional customer service and support. <br>If you ever have any questions or
      concerns about our platform, please do not hesitate to reach out to us.<br> We are always here to help!<br>
      Thank you for choosing our expense tracker website. <br>We look forward to helping you take control of your
      finances and achieve financial freedom!</h4>
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