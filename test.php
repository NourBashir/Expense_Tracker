<!DOCTYPE html>
<html>
<head>
 <title>Information</title>
</head>
<link rel="stylesheet"href="css/style.css">
<header role="banner">
 <a href="home.html"><img id="logo-main" src="images/ett.png" width="100" alt="Logo Thing main logo"></a>
<div class="topnav">
      <a class="active" href="home.html">Home</a>
      <a href="About_Us.html">About us</a>
      <a  href="login.php">Login</a>
      <a href="signup.php">Sign up</a>
      <a  href="#">Add categore</a>
      <a href="#">Reports</a>
      <a href="#">search</a>
      <a href="#">logout</a>
      
    </div>
</header>
<body>
<?php 
include('conn.php');
$Email=$_GET['email'];
$query = "SELECT First_Name,Last_name, phone , Password ,Gender FROM user WHERE email = '$Email'"; // select query
 $result = $conn->query($query);
 if (!$result) 
   {
       echo "<p>Unable to execute the query.</p> ";
       echo $query;
       die ($conn -> error);
   }
   $data = $result->fetch_array(MYSQLI_ASSOC);
if(isset($_POST['update'])) // when click on Update button
{
    $First_Name = $_POST['First_Name'];
    $Last_name = $_POST['Last_name'];
    $Password = $_POST['pass'];
    $phone = $_POST['phone'];

     $query ="update user set First_Name='$First_Name' where Email='$Email'";
     $edit =  $conn->query($query);
     $query ="update user set Last_name='$Last_name' where Email='$Email'";
     $edit =  $conn->query($query);
     $query ="update user set phone='$phone' where Email='$Email'";
     $edit =  $conn->query($query);
     $query ="update user set Password='$Password' where Email='$Email'";
     $edit =  $conn->query($query);
     $query ="update user set Gender='$Gender' where Email='$Email'";
     $edit =  $conn->query($query);


    
    if($edit)
    {
        $conn->close();// Close connection
        header("location:home.html"); // redirects to all records page
        exit;
    }
    else
    {
        echo "<p>Unable to execute the query.</p> ";
        echo $query;
        die ($conn -> error);
    }    	
}
?><!--
<form method="POST">
  <input type="text" name="First_Name" value="<?php# echo $data['First_Name'] ?>" placeholder="Enter Author Name" Required>
  <input type="text" name="Last_name" value="<?php #echo $data['Last_name'] ?>" placeholder="Enter Title" Required>
  <input type="text" name="Password" value="<?php #echo $data['Password'] ?>" placeholder="Enter Price" Required>

  <input type="submit" name="update" value="Update">
</form>
-->

<div style=" background-color:#28224618;padding:60px;background-image: url('images/11.jpg'); background-repeat: no-repeat;background-size: cover;  ">
<div class="info-box">
<h1  align="center" ><img id="logo-main" src="images/p.png" width="100" alt="Logo Thing main logo"><h1 id="myDIV2" style="color: white;font-size:35px">Personal Information:</h1></h1><br>
<img align="right"  id="logo-main" src="images/5.png" width="170" height="180" alt="Logo Thing main logo"><br>
<input type="text" name="First_Name" value="<?php echo $data['First_Name']; ?>" placeholder="Enter Author Name" Required>
<input type="text" name="Last_name" value="<?php echo $data['Last_name']; ?>" Required>
<input type="tel" name="phone" value="<?php echo $data['phone']; ?>" Required>
<h3 id="myDIV2" style="color:white;font-size:25px" >Email :<?php echo $_GET['email']; ?></h3><br>
<input type="text" name="password" value="<?php echo $data['Password']; ?>" Required>
<input type="text" name="gender" value="<?php echo $data['Gender']; ?>" Required><!--
<h3 id="myDIV2" style="color:white;font-size:25px" >pass :<?php #echo $_GET['pass']; ?></h3><br>
<h3 id="myDIV2" style="color:white;font-size:25px" >Phone Number :<?php# echo $_GET['phone']; ?></h3><br>
<h3 id="myDIV2" style="color:white;font-size:25px" >Gender :<?php# echo $_GET['gender']; ?></h3><br>
-->


<h2><a id="myDIV1" href="login.php"  style="color:#3f3961c7;" >Login</a></h2>
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