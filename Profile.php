<?php
include('conn.php');

   session_start();
   if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
    header('Location: /');
   }else {
    $user = $_SESSION['user'];
   }


?>


<html>
    <head>
        <link rel="stylesheet" href="Profile.css">
        <link rel="shortcut icon" href="images\favicon.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Diet & Fitness-My Profile</title>
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
        <a href="Profile.html"><i class="fa fa-user"></i><b>My Profile</b></a>
        <br><br><br>
        <!--<a href="NormalDietPlan.html"><i class="fa fa-bars"></i>Normal Diet Plan</a>
        <br><br><br>
        <a href="SubscriptionDietPlan.html"><i class="fa fa-credit-card"></i>Subscription Plan</a>
        <br><br><br>-->
        <a href="FAQ.html"><i class="fa fa-comment"></i>Support</a>
        <br><br><br>
        <a href="edit-profile.php" class="edit-btn"><i class="fa fa-gears"></i>Edit Profile</a>
        <br><br><br>
        <a href="logout.php" class="edit-btn"><i class="fa fa-long-arrow-left"></i>Logout</a>
        <br><br><br>
    </div


    <!--=========================== Main transparent box ===================================================-->
    <div class="transbox">

    <div class="myprofile">
        <div class="pic">
            <img src="user.png" width="260" height="280" id="photo">
            <form action="Profile.php" method="POST" >
                
            <input type="file" class="my_file" name="upload" id="file">
            <!--<img src="" alt="user profile picture" class="my_file">-->
            </form>
        </div>


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

        <div class="profile">
            <h3><?php echo $row['lname'];?></h3>
            <h3>Gender : <?php echo $row['gender'];?></h3>
            <h3>Age : <?php echo $row['age'];?> years</h3>
            <h3>Height : <?php echo $row['height'];?> cm</h3>
            <h3>BMI : <?php echo $row['bmi'];?></h3>
            <h3>Mobile no : <?php echo $row['phone'];?></h3>
            <h3>Email : <?php echo $row['email'];?> </h3>
        </div>




    </div>

    <div class="mydiet">
        <h1>My Diet</h1>
        <p><?php echo $row['diet'];?></p>
    </div>


   
    <?php
    }
}
?>
</div>

</script>

<script src="app.js"></script>
    </body>
</html>
