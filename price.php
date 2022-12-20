<?php
include("meal.php");

if(isset($_POST['bulk_delete_submit']))
{  
  if(!empty($_POST['checked_id']))
  {
    $idStr=implode(',',$_POST['checked_id']);
    print_r($idStr);
    echo "<br>";
    $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "db" ); 
        $query = mysqli_query($connection, "SELECT * FROM meal_manue WHERE id IN ($idStr)");
        $total_price =0;
            while($row = $query->fetch_assoc()){
              $pr = $row['price'];
              echo $pr;
              $total_price = $pr +$total_price;
            }
}
}
?>