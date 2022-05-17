<?php
$msg = "";
include('conn.php');

if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    //validate form
    if($email == "" || $password == ""){
        $msg = "<p style='text-align: center; color: red'>Invalid parameters</p>";
        header('Location: /');
    }

    //check if user exixts in db
    $checkUser = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($sql, $checkUser);
    $counUser = mysqli_num_rows($result) > 0;
    if(!$counUser){
        $msg = "<p style='text-align: center; color: red'>Invalid email address</p>"; 
    }

    //if the users exist
    if($counUser){
        while($row = mysqli_fetch_assoc($result)){
            $hash = $row['password'];


            if(password_verify($password, $hash)){
                //login the user in
                session_start();
                $_SESSION['user'] = $email;
                header('Location: Home.html');
            }else {
                $msg = "<p style='text-align: center; color: red'>Invalid login credentials</p>";
            }
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images\favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <title>Diet & Fitness-Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            
            <div class="form-container">
                <h3>LOGIN</h3>
                <?php echo $msg;?>
                <form action="index.php" class="form" method="POST">
                    <form action="" class="form">
                        <input type="text" name="email" required placeholder="Email address" >
                        <input type="password" name="password" required placeholder="Password">
                        
                        <button type="submit" name="Login">LOGIN &nbsp; <span class="fa fa-paper-plane"></span></button>
                </form>
                <p>Don't have an account yet? <a href="signup.php"><br><span>Create an account here</span></a></p>
            </div>
        </div>
    </div>
</body>
</html>