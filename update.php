<!DOCTYPE html>
<html>
<head>
 <title>Update</title>
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
      <a href="#">logout</a>

<?php
session_start();

include('conn.php');

if(isset($_SESSION['User_Id']))
    {   
        $User_Id = $_SESSION['User_Id'];
        $First_name = $_SESSION['First_name'];
        $Last_name = $_SESSION['Last_name'];
        $Email = $_SESSION['Email'];
        $phone = $_SESSION['phone'];
        $Gender = $_SESSION['Gender'];
        $Password = $_SESSION['Password'];
    
    } 
else 
    {
     header("location:login.php");
    } 
    ?></div>
 <body>

  
    <div class="signup-box">
    <h1 id="myDIV" align="center" style="color:white;font-size:50px">Up Date</h1><br>

    <form  method="POST">
  <h3  id="myDIV" style="color:black;"  >First Name:</label>
   <input type="text" name="First" value="<?php echo "$First_name"; ?>" placeholder="First_Name" Required></h3><br>
        

   <h3 id="myDIV" style="color:black;">Last Name:</label>
  <input type="text" name="Last" value="<?php echo "$Last_name"; ?>" placeholder="Enter Last_name" Required></h3><br>

  <h3 id="myDIV" style="color:black;">Phone Number:</label>
  <input type="text" name="phon" value="<?php echo "$phone"; ?>" placeholder="Enter phone" Required></h3><br>

  <h3 id="myDIV" style="color:black;">Gender :</label>
  <input type="text" name="Gend" value="<?php echo "$Gender"; ?>" placeholder="Enter Gender" Required></h3><br>

  <h3 id="myDIV" style="color:black;">Password:&nbsp;&nbsp;&nbsp;</label>
  <input type="text" name="Pass" value="<?php echo "$Password"; ?>" placeholder="Enter Password" Required></h3><br>
 
    <input  style="color:#3f3961c7;"class="btn" type="submit" name="update" value="Update">
    </div>

</form>

    <?php
if (isset($_POST['update'])) // when click on Update button
 { echo"$User_Id";
    $First_name = $_POST['First'];
    $Last_name = $_POST['Last'];
    $phone = $_POST['phon'];
    $Gender = $_POST['Gend'];
    $Password = $_POST['Pass'];

    echo "<p>Unable to execute the query.</p> ";
    
    $query ="UPDATE `user` SET `First_name`='$First_name',`Last_name`='$Last_name',`Email`='$Email',`Password`='$Password',`Gender`='$Gender' WHERE `User_Id`='$User_Id'";
    $edit =  $conn->query($query);
      echo $query;

       if($edit)
    {   $conn->close();
      $_SESSION['First_name'] = $_POST['First'];
      $_SESSION['Last_name']=$_POST['Last'];
      $_SESSION['Password']=$_POST['Pass'];
      $_SESSION['phone'] = $_POST['phon'];
      $_SESSION['Gender'] = $_POST['Gend'];
  
        header("location:info.php"); // redirects to all records page
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

<footer>
    <div style="background-color: #3f3961; width:100%; height: 20px;">
      <p align="left" style="color:white;">Author: Nour Bashir &nbsp;&nbsp; <a href="http://www.gmail.com/"><img src="images/gmail.png"
            alt="Avatar" class="avatar"></a>
        <a href="http://www.facebook.com/"><img src="images/Facebook_Logo_(2019).png" alt="Avatar" class="avatar"></a>
        <a href="http://www.instagram.com/"><img src="images/insta.png" alt="Avatar" class="avatar"></a></p>
    </div>
  </footer>
</body>