<?php 
include('conn.php');
error_reporting(0);
$Email=$_GET['email'];
#$query="select * from user where Email='$Email' ";
#$data=mysqli_query($conn,$query);
#$total=mysqli_num_rows($data);

$product_array = $conn->query("SELECT * FROM user where Email='$Email'");
if (!$product_array) {
    echo "<p>Unable to execute the query.</p> ";
    echo $query;
    die($conn->error);
}
if (!empty($product_array)) {
    while ($data = $product_array->fetch_array(MYSQLI_ASSOC)) {
        
        ?>
        <div class="product-item">
            <form method="post" action="update.php?Email=<?php echo $data["Email"];?>">
                <div>
                    <div>
                        <?php echo $data["First_name"]; ?>
                    </div>
                    <div>
                        <?php echo $data["Last_name"]; ?>
                    </div>
                    <div>
                        <?php echo $data["phone"]; ?>
                    </div>
            
                    <div>
                        <input type="submit" value="Up date" class="btnAddAction" />
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}
#if($total != 0)
#{
 #   while($result=mysql_fetch_assoc($data))
  #  {
   #     echo"
    #    ".$result['First_name']."
     #   ".$result['Last_name']."
      #  ".$result['email']."
       # ";
    #}
#}