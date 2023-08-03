<!DOCTYPE html>
<html>
<head>
 <title>All reviews</title>
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
       <a href="add_review.php"> Add review</a>
      <a href="all_review.php"> My reviews</a>

      <a href="info.php">Personal Information</a>
     

      <a href="logout.php">logout</a>
<?php
include('conn.php');
session_start();

if(isset($_SESSION['User_Id']))
  {
    $First_Name = $_SESSION['First_name'];

    $User_Id = $_SESSION['User_Id'];

    $sql = "SELECT * FROM review WHERE User_Id = $User_Id";
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
?>        
    </div>
</header>
<body>
<div style=" background-color:#28224618;padding:60px;background-image: url('images/11.jpg'); background-repeat: no-repeat;background-size: cover;  ">
<div class="info-box">
<h1  align="center" ><img id="logo-main" src="images/cat.png" width="100" alt="Logo Thing main logo"><h1 id="myDIV2" style="color: white;font-size:35px">My Reviews:</h1></h1><br>
<img align="right"  id="logo-main" src="images/catt.png" width="170" height="180" alt="Logo Thing main logo"><br>
<?php 
$count=0;
while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
    $count+=1; 
 ?>
<h3 id="myDIV2" style="color: white;font-size:25px" ><?php echo $count; ?>  . Rate: <?php echo $data['rate']; ?>
<h3 id="myDIV2" style="color: white;font-size:25px" >Comment :<?php echo $data['comment']; ?>
<h3 id="myDIV2" style="color: white;font-size:25px" >date: <?php echo $data['date']; ?></h3><br>

<?php } ?>
<h2><a id="myDIV1" href="add_review.php"  style="color:#3f3961c7;" >Add Review</a></h2><br>

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