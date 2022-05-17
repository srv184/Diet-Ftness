<?php

include('conn.php');

//get all users detail
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
    header('Location: index.php');
}else {
    $user = $_SESSION['user'];
}

if(isset($_POST['updateprofile'])){
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "UPDATE `users` SET `email`='$email',`lname`='$lname',`age`='$age',
    `height`='$height',`phone`='$phone' ,`gender`='$gender' WHERE `email` = '$email' ";

    $result = mysqli_query($sql, $query);

    if($result){
        echo "<script>alert('Record updated successfully')</script>";
        echo "<script>window.location.assign('Profile.php')</script>";
    }else {
        echo "<script>alert('Something went wrong')</script>";
        echo "<script>window.location.assign('index.php')</script>";
    }
}

?>





<html>
    <head>
        <link rel="stylesheet" href="edit-profile.css">
        <link rel="shortcut icon" href="images\favicon.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Diet & Fitness-Edit Profile</title>
    </head>
    <body>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Acme&family=Amatic+SC&family=Cedarville+Cursive&family=Courgette&family=Dancing+Script&family=Felipa&family=Great+Vibes&family=Hurricane&family=Inspiration&family=Merienda:wght@700&family=Pacifico&family=Patrick+Hand&family=Romanesco&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="outer">
        <h1>Diet<span>&</span>Fitness</h1>
        <br><br><br><br><br>
        <a href="About.html"><i class="fa fa-desktop"></i>About Us</a>
        <br><br><br>
        <a href="Profile.php"><i class="fa fa-user"></i>My Profile</a>
        <br><br><br>
        <!--<a href="NormalDietPlan.html"><i class="fa fa-bars"></i>Normal Diet Plan</a>
        <br><br><br>
        <a href="SubscriptionDietPlan.html"><i class="fa fa-credit-card"></i>Subscription Plan</a>
        <br><br><br>-->
        <a href="FAQ.html"><i class="fa fa-comment"></i>Support</a>
        <br><br><br>
        <a href="edit-profile.php" class="edit-btn"><i class="fa fa-gears"></i><b>Edit Profile</b></a>
        <br><br><br>
        <a href="logout.php" class="edit-btn"><i class="fa fa-long-arrow-left"></i>Logout</a>
        <br><br><br>
    </div

    <?php
        $checkUser = "SELECT * FROM `users` WHERE `email` = '$user'";
        $result = mysqli_query($sql, $checkUser);
        $counUser = mysqli_num_rows($result) > 0;
        if(!$counUser){
            echo "<script>alert('invalid user')</script>";
            echo "<script>window.location.assign('./')</script>";
        }

        if($counUser){
            while($row = mysqli_fetch_assoc($result)){


    ?>

    <!--=========================== Main transparent box ===================================================-->
    <div class="transbox">


        <div class="profile">
            <h1>Update Your Details</h1>
            <form action="edit-profile.php" method="POST" class="form" >
               

                <div class="form-group1">
                    <label for=lname">User Name</label>
                    <input type="text" value="<?php echo $row['lname'];?>" id="lnmae" name="lname" required >
                </div><br><br>

                <div class="form-group2">
                    <label for="age">Age</label>
                    <input type="text" value="<?php echo $row['age'];?>" id="age" name="age" required >
                </div><br><br>

                <div class="form-group3">
                    <label for="gender">Gender</label>
                    <input type="text" value="<?php echo $row['gender'];?>" id="gender" name="gender" required >
                </div><br><br>

                <div class="form-group4">
                    <label for="height">Height (in cms)</label>
                    <input type="text" value="<?php echo $row['height'];?>" id="height" name="height" required >
                </div><br><br>
                
                <div class="form-group5">
                    <label for="email">Email Address</label>
                    <input type="email" value="<?php echo $row['email'];?>" id="email" name="email" required >
                </div><br><br>
                
                
                <div class="form-group6">
                    <label for="text">Phone no</label>
                    <input type="text" value="<?php echo $row['phone'];?>" id="phone" name="phone" required >
                </div><br><br>
                
                <center>
                    <br><br><br><br>
                    <button name="updateprofile" type="submit" class="btn">UPDATE</button>
                </center>

            </form>
        </div>


    </div>


    <?php
            }
        }
    ?>


</div>

</script>
    </body>
</html>