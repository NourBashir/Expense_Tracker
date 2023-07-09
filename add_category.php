<!DOCTYPE html>
<html>

<?php
session_start();
?>
<title>Add Category</title>
<link rel="stylesheet"href="css/style.css">
<header role="banner">
 <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
<div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="about_us.php">About us</a>
      <a  href="all_category.php">Categore</a>
      <a href="#">Reports</a>
      <a href="#">search</a>
      <?php
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
</header>
<body>
<?php
if(isset($_POST['name'])) 
{
  $name=$_POST['name'];
  $amount=$_POST['amount'];
  $User_Id = $_SESSION['User_Id'];

  $sql="select * from category where Category_Name='$name' AND User_Id='$User_Id' ";
  $query=mysqli_query($conn,$sql);
  $count_name=mysqli_num_rows($query) ;
  if ($count_name==0)
  {
        $sql="INSERT INTO category(Category_Name,amount,User_id) VALUES ('$name','$amount','$User_Id')";
        $query=mysqli_query($conn,$sql);
        if($query)
        {
            header("Location:all_category.php");
        }
  }
 else
 {
   if($count_name>0)
   {
     $error_msg['pass4']="category already exists!";
   }

  }
}    
?>
 <div style=" background-color:#28224618;padding:60px;background-image: url('images/1.jpg'); background-repeat: no-repeat;background-size: cover; ">
<div class="signup-box">
<h1 id="myDIV" align="center" style="color:white;font-size:50px">Add Category</h1><br>
<form method="POST"  >
<p>
        <label id="myDIV" style="color:white;"  >Category Name:</label>
        <input type="text" name="name" placeholder="Please Enter Category Name"class="text1" required>
        </p>
        <p>
        <label id="myDIV" style="color:white;">Amount:</label>
        <input type="text" name="amount" placeholder="Please Enter Amount"class="text1" required>
        </p>
        <br>
        <div class="error_msg">
        <?php
        if(isset($error_msg['pass4']))
      {
            echo $error_msg['pass4'];
        }
        ?>
</div>
        <p>
            <input style="color:#3f3961c7;"class="btn" type="submit" name="add"value="Add Category">
            <input  style="color:#3f3961c7;"class="btn" type="reset" value="Clear">
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
