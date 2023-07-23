
<!DOCTYPE html>
<html>
<head>
 <title>All Category</title>
</head>
<link rel="stylesheet"href="css/style.css">
<header role="banner">
 <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
<div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="About_Us.php">About us</a>
      <a  href="all_category.php">Categore</a>
      <a href="expenses.php">Expenses</a>
      <a href="add_expense.php">Expenses2</a>
      <a href="info.php">Personal Information</a>
      <a href="logout.php">logout</a>
<?php
include('conn.php');
session_start();

if(isset($_SESSION['User_Id']))
  {
    $First_Name = $_SESSION['First_name'];

    $User_Id = $_SESSION['User_Id'];
    
    ?> <h1 id="myDIV2" style="color:white;font-size:40px" align="center"><?php  echo "Hello $First_Name"; ?></h1><br>
<?php
  } 
else 
  {
    header("location:login.php");

  }
?>        
    </div>
</header>
<body>
<?php

if(isset($_POST['delete'])) // when click on Update button
{
    $x=$_GET['Expense_Id'];

    
    echo $x;
    $Category_Name=$_GET['Category_Name'];
    $expense=$_GET['expense'];
    $comment=$_GET['comment'];
    $date=$_GET['date'];
    
     $query ="DELETE from expense where Expense_Id='$x'  ";
    $delete =$conn->query($query);

    if($delete)
    {
        $conn->close();// Close connection
        header("location:expenses.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "<p>Unable to execute the query.</p> ";
        echo $query;
        die ($conn -> error);
    }    	
}
?>    
<div style=" background-color:#28224618;padding:60px;background-image: url('images/11.jpg'); background-repeat: no-repeat;background-size: cover;  ">
<div class="info-box">
<h1  align="center" ><img id="logo-main" src="images/cat.png" width="100" alt="Logo Thing main logo"><h1 id="myDIV2" style="color: white;font-size:35px">Are you sure...?</h1></h1><br>
<img align="right"  id="logo-main" src="images/catt.png" width="170" height="180" alt="Logo Thing main logo"><br>
<form method="POST">
<h3 id="myDIV2" style="color: white;font-size:25px" > Name: <?php echo $_GET['Category_Name'];?>
<h3 id="myDIV2" style="color: white;font-size:25px" >expense: <?php echo $_GET['expense'];?>
<h3 id="myDIV2" style="color: white;font-size:25px" >payment: <?php echo $_GET['payment'];?>
<h3 id="myDIV2" style="color: white;font-size:25px" >comment :<?php echo $_GET['comment'];?></h3>
<h3 id="myDIV2" style="color: white;font-size:25px" >Date :<?php echo $_GET['date'];?></h3>
<input  style="color:#3f3961c7;"class="btn" type="submit" name="delete" value="delete"><br><br><br>
<h2><a href="expenses.php">No</a></h2>
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