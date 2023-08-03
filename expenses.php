<!DOCTYPE html>
<html>
<head>
 <title>All Expenses</title>
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
?>        
    </div>
</header>
<body>
<div style=" background-color:#28224618;padding:60px;background-image: url('images/11.jpg'); background-repeat: no-repeat;background-size: cover;  ">
<div class="info-box">
<h1  align="center" ><img id="logo-main" src="images/cat.png" width="100" alt="Logo Thing main logo"><h1 id="myDIV2" style="color: white;font-size:35px">Expenses:</h1></h1><br>
<img align="right"  id="logo-main" src="images/catt.png" width="170" height="180" alt="Logo Thing main logo"><br>
<?php 
try {
$count=0;
while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
  $count+=1; 
 ?>
 <h3 id="myDIV2" style="color: white;font-size:25px" ><?php $Expense_Id=$data['Expense_Id'];?>
<h3 id="myDIV2" style="color: white;font-size:25px" ><?php echo $count; ?>  . Name: <?php echo $data['Category_Name'];
$Category_Name=$data['Category_Name'];?>
<h3 id="myDIV2" style="color: white;font-size:25px" >expense: <?php echo $data['expense'];
$expense=$data['expense'];?>
<h3 id="myDIV2" style="color: white;font-size:25px" >payment: <?php echo $data['payment'];
$payment=$data['payment'];?>
<h3 id="myDIV2" style="color: white;font-size:25px" >comment :<?php echo $data['comment'];
$comment= $data['comment']?></h3>
<h3 id="myDIV2" style="color: white;font-size:25px" >Date :<?php echo $data['date'];
$date=$data['date']; ?></h3>
<h2><a href="delete.php?Category_Name=<?php echo $Category_Name; ?>&expense=<?php echo $expense; ?>
&comment=<?php echo $comment; ?>&date=<?php echo $date; ?>&payment=<?php echo $payment; ?>&Expense_Id=<?php echo $Expense_Id; ?>">Delete</a></h2>

<br><br>

<?php } 
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>
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