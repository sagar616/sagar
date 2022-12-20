<?php


    if(isset($_POST['color'])) {
    $name = $_POST['color'];
    $total_price =0;

    // echo "You chose the following color(s): <br>";
    foreach ($name as $color){
    // echo $color."<br />";
    $total_price = $total_price+$color;

    }} 
    else {

    echo "You did not choose a color.";

    }
    echo "You have to pay:".$total_price;
    ?>
