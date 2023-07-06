<!DOCTYPE html>
<html>
<head>
 <title>Information</title>
</head>
<link rel="stylesheet"href="css/style.css">
<header role="banner">
 <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
<div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="About_Us.php">About us</a>
      <a  href="add_category.php">Add categore</a>
      <a href="#">Reports</a>
    
      <a href="#">search</a>
      <a href="info.php">Personal Information</a>
      <a href="#">logout</a>
<?php
include('conn.php');
session_start();

if(isset($_SESSION['User_Id']))
  {
    $User_Id = $_SESSION['User_Id'];
    $First_Name = $_SESSION['First_name'];
    $Last_name = $_SESSION['Last_name'];
    $Email = $_SESSION['Email'];
    $phone = $_SESSION['phone'];
    $Gender = $_SESSION['Gender'];
    $Password = $_SESSION['Password'];
    $First_Name = $_SESSION['First_name'];

  } 
else 
  {
    header("location:login.php");

  }
?>        
        <h1 id="myDIV2" style="color:white;font-size:40px" align="center"><?php  echo "Hello ". $First_Name; ?></h1><br>

    </div>
</header>


<body>
<?php

 $sql = "SELECT * FROM user WHERE User_Id = $User_Id";
 $result = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($result)) {
 echo "User ID: " . $row["User_Id"] . "<br>";
 echo "Name: " . $row["First_name"] . "<br>";
 echo "Last_name: " . $row["Last_name"] . "<br>";
 }
?>
<div style=" background-color:#28224618;padding:60px;background-image: url('images/11.jpg'); background-repeat: no-repeat;background-size: cover;  ">
<div class="info-box">
<h1  align="center" ><img id="logo-main" src="images/p.png" width="100" alt="Logo Thing main logo"><h1 id="myDIV2" style="color: white;font-size:35px">Personal Information:</h1></h1><br>
<img align="right"  id="logo-main" src="images/5.png" width="170" height="180" alt="Logo Thing main logo"><br>



<h3 id="myDIV2" style="color: white;font-size:25px" >First Name :<?php echo  $First_Name; ?></h3><br>
<h3 id="myDIV2" style="color:white;font-size:25px" >Last Name :<?php echo $Last_name; ?></h3><br>
<h3 id="myDIV2" style="color:white;font-size:25px" >Email:<?php echo $Email; ?></h3><br>
<h3 id="myDIV2" style="color:white;font-size:25px" >Phone Number :<?php echo $phone; ?></h3><br>
<h3 id="myDIV2" style="color:white;font-size:25px" >Gender :<?php echo $Gender; ?></h3><br>
<h3 id="myDIV2" style="color:white;font-size:25px" > Password :<?php echo $Password; ?></h3><br>

<h2><a id="myDIV1" href="login.php"  style="color:#3f3961c7;" >Login</a></h2>
<h2><a id="myDIV1" href="update.php"  style="color:#3f3961c7;" >Up Date</a></h2>


</div>
</div>
<footer>
    <div style="background-color: #3f3961; width:100%; height: 20px;">
      <p align="left" style="color:white;">Author: Nour Bashir &nbsp;&nbsp; <a href="http://www.gmail.com/"><img src="images/gmail.png"
            alt="Avatar" class="avatar"></a>
        <a href="http://www.facebook.com/"><img src="images/Facebook_Logo_(2019).png" alt="Avatar" class="avatar"></a>
        <a href="http://www.instagram.com/"><img src="images/insta.png" alt="Avatar" class="avatar"></a></p>
    </div>
  </footer>
</body>