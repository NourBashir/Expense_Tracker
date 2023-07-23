<!DOCTYPE html>
<html>
<head>
  <title> Search Results</title>
</head>
<link rel="stylesheet"href="css/style.css">
<header role="banner">
 <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
<div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="About_Us.php">About us</a>
      <a  href="all_category.php">Categore</a>
      <a href="expenses.php">Expenses</a>
      <a href="add_expense.php">add Expenses</a>
      <a href="search.php">search expense</a>
      <a href="info.php">Personal Information</a>
      
      <a href="logout.php">logout</a>
<?php
try{
include('conn.php');
session_start();

if(isset($_SESSION['User_Id']))
  {
    $First_Name = $_SESSION['First_name'];

    $User_Id = $_SESSION['User_Id'];

    $sql = "SELECT * from expense join category on expense.Category_id=category.Category_Id";
    $result = mysqli_query($conn, $sql);
   
    if (!$result) {
      echo $query;
      die($conn->error);

    }
    
    ?> <h1 id="myDIV2" style="color:white;font-size:40px" align="center"><?php  echo "Hello $First_Name"; ?></h1><br>
<?php
  } 
else 
  {
    header("location:login.php");

  }
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>        
    </div>
</header>
<div style=" background-color:#28224618;padding:60px;background-image: url('images/1.jpg'); background-repeat: no-repeat;background-size: cover; ">
<div class="signup-box">
<h1 id="myDIV" align="center" style="color:white;font-size:50px">search </h1><br>
<form action="search_result.php" method="post">
<p>
        <label id="myDIV" style="color:white;"  >Category Name:</label>
        <input type="text" name="Category_Name" placeholder="Please Enter Category Name"class="text1" >
        </p>
        <p>
        <label id="myDIV" style="color:white;">Date:</label>
        <input type="date" name="date" placeholder="Please Enter date"class="text1" >
        </p>
        <br>
        <p>
       <input style="color:#3f3961c7;"class="btn" type="submit" name="submit" value="Search">

        </p>
    </form>
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
</html>


