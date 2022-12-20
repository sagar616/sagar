 <html>
<body>
 
<form method = "POST" action = "" >
  <input  name="firstName"  type="text"> 
  <input  name="lastName"  type="text">
  <input  type="submit"  name="submit"  value="submit" >
</form>
</body>
</html>
<?php
    require('db.php');
    $username =  $_POST["firstName"];
    $lastName =  $_POST["lastName"];
    // $confirmPassword = $_POST['confirmPassword'];
    // $email = $_POST['email'];

    if(isset($_POST["submit"])){
        if($query = mysqli_query($conn,"INSERT INTO `curl` (`id`, `first_name`, `last_name`) 
        VALUES (NULL, '".$username."', '".$lastName."')")){
            // echo "Success";
        }else{                  
            echo "Failure" . mysqli_error($conn);
        }
        echo "Full name is " . $_POST["firstName"] .
     "  " . $_POST["lastName"];
  exit;
    }
?>