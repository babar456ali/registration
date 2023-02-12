<?php
    $insert = false;
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . 
        mysqli_connect());
    }
   // echo "success connecting to this db";

   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $desc = $_POST['desc']; 
   $sql = "INSERT INTO `events`.`events` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
           VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc',
           current_timestamp());";
//echo $sql;

if($con->query($sql) == true){
   // echo "successfully inserted";
   $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
} 
    
$con->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="image" src="form.jpg" alt="Aptech Garden">
    <div class="container">
        <h3>Welcome on Event for Aptech Learning Garden</h3>
        <p>Enter your details and submit this form to confirm your participation on event</p>
        <?php
        if($insert == true)
         echo "<p class='fillingMsg'>Thanks for submitting your form. We are happy to see you joining 
         us for the Aptech learning event</p>"
        
    ?>
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
        <input type="email" name="email" id="email" placeholder="Enter your Email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here."></textarea>
        <button class="btn">Submit</button>
    </form>
    </div>
    
</body>
</html>