<?php
include('conn.php');
session_start();

echo "I'm here";
echo isset($_POST['form1']) ;
$User_Id = $_SESSION['User_Id'];
$First_Name = $_SESSION['First_name'];
$Last_name = $_SESSION['Last_name'];
$Email = $_SESSION['Email'];
$phone = $_SESSION['phone'];
$Gender = $_SESSION['Gender'];
$Password = $_SESSION['Password'];

if(isset($_POST['update']) )// when click on Update button
{
    echo "<p>Unable to execute the query.</p> ";
    $query ="UPDATE user set First_Name='$First_Name' where User_Id='$User_Id'";
   echo $query;
    $edit =  $conn->query($query);
    $query ="UPDATE user set Last_name='$Last_name' where User_Id='$User_Id'";
    $edit =  $conn->query($query);
    $query ="UPDATE user set phone='$phone' where User_Id='$User_Id'";
    $edit =  $conn->query($query);
    $query ="UPDATE user set Password='$Password' where User_Id='$User_Id'";
    $edit =  $conn->query($query);
    $query ="UPDATE user set Gender='$Gender' where User_Id='$User_Id'";
    $edit =  $conn->query($query); 
       if($edit)
    {   $conn->close();
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
else
{
    echo "<p>Unable .</p> ";
}    	
?>