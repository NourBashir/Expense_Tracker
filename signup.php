<!DOCTYPE html>
<html>

<?php
session_start();
?>
<title>signup</title>
<link rel="stylesheet"href="css/style.css">
<header role="banner">
 <a href="home.php"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
<div class="topnav">
      <a class="active" href="home.php">Home</a>
      <a href="about_us.php">About us</a>
      
      <a  href="add_category.php">Add categore</a>
      <a href="#">Reports</a>
      <a href="#">search</a>
      <a  href="login.php">Login</a>
      <a href="signup.php">Sign up</a>
      
    </div>
</header>
<body>
<?php

 include('conn.php');
 if(isset($_POST['pass'])) {
 $First_Name=$_POST['fname'];
 $Last_Name=$_POST['Last_name'];
 $Email=$_POST['email'];
 $pass = $_POST['pass'];
 $pass2 = $_POST['pass2'];
 $phone=$_POST['phone'];
 $Gender=$_POST['Gender'];


 $sql="select * from user where Email='$Email' ";
 $query=mysqli_query($conn,$sql);
 $count_email=mysqli_num_rows($query) ;

if ($count_email==0)
 {
    if($pass == $pass2) {
        $sql="INSERT INTO user(First_name,Last_name,Email,Password,Gender,phone) VALUES ('$First_Name','$Last_Name','$Email','$pass','$Gender','$phone')";
        $query=mysqli_query($conn,$sql);


        if($query)
        {
           # $First_Name=$_POST['fname'];
            #$Last_name=$_POST['Last_name'];
            #$Email=$_POST['email'];
            #$phone=$_POST['phone'];
            #$gender=$_POST['gender'];
            #$id = $_POST['id'];

            #echo"<script>location.href='information.php?First_Name=$First_Name&Last_name=$Last_name&email=$Email&pass=$pass&phone=$phone&gender=$gender'</script>";

            header("Location:login.php");
        }
       } 
    else 
    {
         $error_msg['pass3']="passwords d'not match";
    }
  }
else
 {
   if($count_email>0)
   {
     $error_msg['pass4']="email already exists!";

   }

 }
 }
?>
 <div style=" background-color:#28224618;padding:60px;background-image: url('images/1.jpg'); background-repeat: no-repeat;background-size: cover; ">
<div class="signup-box">
<h1 id="myDIV" align="center" style="color:white;font-size:50px">Signup</h1><br>
<form method="POST"  >
<p>
        <label id="myDIV" style="color:white;"  >First Name:</label>
        <input type="text" name="fname" placeholder="Please Enter first name"class="text1" required>
        </p>
        <p>
        <label id="myDIV" style="color:white;">Last Name:</label>
        <input type="text" name="Last_name" placeholder="Please Enter last name"class="text1" required>
        </p>
        <p>
            <label id="myDIV" style="color:white;">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="email" name="email" class="text1"placeholder="Please Enter Your Email"  title="It should contain from (10 to 15) letters" required>
        </p>
        <p>
<label id="myDIV" style="color:white;">Password:&nbsp;&nbsp;&nbsp;</label>
<input class="text1" type="password" name="pass" pattern="[a-zA-Z0-9!@#$%^&*]{8,10}" placeholder="Password"  minlight='8' 
title="Must contain at least one number and one uppercase and lowercase letter and symbols ,and at least 8 or more characters" required  >
<br>
<label id="myDIV" style="color:white;">Confirm Password</label>
<input type="password" name="pass2"  class="text1" placeholder="Confirm Password"  required  >
<br>       
<label id="myDIV" style="color:white;">Phone Number</label>
<input type="tel"  class="text1"name="phone"placeholder="09xxxxxxxx" pattern="[0-9]{10}" title="It should contain from (10) numbers"required>
<br>
        </p>
       
        <p>
            <input  type="radio" id="female" name="Gender" value="Female" checked>
            <label  id="myDIV" style="color:white;" for="female">Female</label><br>
            <input type="radio" id="male" name="gender" value="Male">
            <label id="myDIV" style="color:white;" for="male">Male</label><br>
        </p>
        <br>
        <p>
            <input type="checkbox" name="accepts_tos" value="yes" required><label  id="myDIV" style="color:white;"> I agree to the</label>
            <a href="/html-css-practice-test/" target="_blank">terms of service</a>
        </p>
        <br>
        <div class="error_msg">
        <?php
        if(isset($error_msg['pass3']))
        {
            echo $error_msg['pass3'];
        }
        if(isset($error_msg['pass4']))
        {
            echo $error_msg['pass4'];
        }
        ?>
</div>
        <p>
            <input style="color:#3f3961c7;"class="btn" type="submit" value="Sign up">
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
