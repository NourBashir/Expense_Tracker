<!DOCTYPE html>
<html>
<head>
 <title>Login </title>
</head>
<link rel="stylesheet"href="css/style.css">
<header role="banner">
 <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
<div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="about_us.php">About us</a>
      <a  href="all_category.php"> Category</a>
      <a  href="login.php">Login</a>
      <a href="signup.php">Sign up</a>

    </div>
</header>
<body>
 <?php
session_start();  

  include('conn.php');
if(isset($_POST['Email']))
{
  $Email =$_POST['Email'];
  $Password =$_POST['Password'];
  $sql="select * from user where Email='$Email' && Password='$Password'";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
  $count=mysqli_num_rows($query) ;
   if($count==1)
   {  
    $_SESSION['User_Id']=$row['User_Id'];  
    $_SESSION['First_name'] = $row['First_name'];
    $_SESSION['Last_name']=$row['Last_name'];  
    $_SESSION['Email'] = $row['Email'];
    $_SESSION['Password']=$row['Password'];  
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['Gender'] = $row['Gender'];
    $_SESSION['Category_Name']=$row['Category_Name'];  
    $_SESSION['amount'] = $row['amount'];
    header("Location:home.php");
   }
   else
   {
     $error_msg['pass3']="Invalid Email or password";
   }

}

 ?>
 <div style=" background-color:#28224618;padding:60px;background-image: url('images/1.jpg'); background-repeat: no-repeat;background-size: cover;  ">
<div class="login">
<h1 id="myDIV" align="center" style="color:white;font-size:50px">Login</h1><br>
 <form method="post">
  <label  id="myDIV" style="color:white;" for="username">Username:</label>
  <input type="text" id="Email" name="Email" class="text" placeholder="Enter Your Email" required><br><br>
  <label  id="myDIV" style="color:white;" for="password">Password:</label>
  <input type="password" id="password" name="Password" class="text" placeholder="Enter Your Password" required>
  <div class="error_msg">
        <?php
        if(isset($error_msg['pass3']))
        {
            echo $error_msg['pass3'];
        }
        ?>
</div>
        <input type="checkbox" id="check" required>
        <span id="myDIV" style="color:white;" >Remember me</span><br><br>
   <h1> <input    type="submit" name="login" value="Login" class="btn" style="color:#3f3961;" ></input></h1>
    <br>
    </div>
</form>
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
    