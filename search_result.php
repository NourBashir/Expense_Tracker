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
  <?php
try{
    // create short variable names
    $Category_Name=$_POST['Category_Name'];
    $date=$_POST['date'];

    if ((!$Category_Name || $date)&&($Category_Name ||! $date)&&(!$Category_Name || !$date)) {
       echo '<p>You have not entered search details.<br/>
       Please go back and try again.</p>';
       exit;
    }
 
    $query = "SELECT * from expense join category on expense.Category_id=category.Category_Id WHERE Category_Name Like  '%$Category_Name%' AND date Like '%$date%'";
    $result = mysqli_query($conn,$query);
    if (!$result) 
    {
        echo "<p>Unable to execute the query.</p> ";
        echo $query;
        die ($conn-> error);
    }
  ?>
  <div style=" background-color:#28224618;padding:60px;background-image: url('images/11.jpg'); background-repeat: no-repeat;background-size: cover;  ">
<div class="info-box">
<h1  align="center" ><img id="logo-main" src="images/cat.png" width="100" alt="Logo Thing main logo"><h1 id="myDIV2" style="color: white;font-size:35px"><?php echo "<p>Number of Expenses found: ".$result->num_rows."</p>";?></h1></h1><br>
<img align="right"  id="logo-main" src="images/catt.png" width="170" height="180" alt="Logo Thing main logo"><br>
<?php 
 $count=0;
    $rows = $result->num_rows;

   for ($j = 0 ; $j < $rows ; ++$j)
    {  $row = $result->fetch_array(MYSQLI_ASSOC);
        $count+=1;
 ?>

<h2 id="myDIV2" style="color: white;font-size:25px" ><?php echo "<p>$count<strong> .Name: " .  $row['Category_Name'] . "</strong>";?></h2>
<h2 id="myDIV2" style="color: white;font-size:25px" ><?php echo "<br />Expense: ". number_format($row['expense'],2) ." LYD </p>";?></h2>
<h2 id="myDIV2" style="color: white;font-size:25px" > <?php echo "<br />Payment: ".  $row['payment'];?></h2>
<h2 id="myDIV2" style="color: white;font-size:25px" ><?php  echo "<br />Comment: " . $row['comment'] ;?></h2>
<h2 id="myDIV2" style="color: white;font-size:25px" ><?php  echo "<br />Date: ".  $row['date'];?></h2><br><hr><br>
<?php }    
 $conn->close();
} 
catch (Exception $e) 
{
  echo 'Caught exception: ',  $e->getMessage(), "\n";
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
</body>
</html>
