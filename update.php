

<?php
include('conn.php');
session_start();

if(isset($_SESSION['User_Id']))
    {
    $First_Name = $_SESSION['First_name'];
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
   
    $User_Id = $_SESSION['User_Id'];

if (isset($_POST['update'])) // when click on Update button
 { echo"$User_Id";
    echo "<p>Unable to execute the query.</p> ";
    $query ="UPDATE `user` SET `First_name`='$First_Name',`Last_name`='$Last_name',`Email`='$Email',`Password`='$Password',`Gender`='$Gender',`phone`='$phone' WHERE `User_Id`='$User_Id'";
    $edit =  $conn->query($query);
  
       if($edit)
    {   $conn->close();
      #  header("location:update.php"); // redirects to all records page
      exit;
    }
    else
    {
        echo "<p>Unable to execute the query.</p> ";
        echo $query;
        die ($conn -> error);
    
    } 
}
else
{
    echo "<p>Unable .</p> ";
}    	
?>

<form  method="POST">
<input type="text" name="First_Name" value="<?php echo "$First_Name"; ?>" placeholder="First_Name" Required>
  <input type="text" name="Last_name" value="<?php echo "$Last_name"; ?>" placeholder="Enter Last_name" Required>
  <input type="text" name="phone" value="<?php echo "$phone"; ?>" placeholder="Enter phone" Required>
  <input type="text" name="Gender" value="<?php echo "$Gender"; ?>" placeholder="Enter Gender" Required>
  <input type="text" name="Password" value="<?php echo "$Password"; ?>" placeholder="Enter Password" Required>
    <input type="submit" name="update" value="Update">
</form>
