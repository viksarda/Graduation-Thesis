<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Image.php');
if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        die('Not logged in!');
}
$token = $_COOKIE['SNID'];
$user_id = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
$username = DB::query('SELECT username FROM users WHERE id=:uid', array(':uid'=>$user_id))[0]['username'];

if (isset($_POST['updateprofile'])) {

        Image::uploadImage('profileimg', "UPDATE users SET profileimg = :profileimg WHERE id=:userid", array(':userid'=>$userid));
        header("Location: profile.php?username=$username");
}




?>
<html>

        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Viksagram</title>
        <link rel="icon" href="assets/img/Logoicon.png">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        </head>

        <body style="background-color: #F1F7FC;">
        <div class="login-clean1">
                <form action="my-account.php" method="post" enctype="multipart/form-data">
                        <h2 class="sr-only">My account</h2>
                        <div class="illustration"><img src="assets/img/Logo.png" style="max-width:60%"></i></div>
                        <hr>
                        <a class="forgot" style="font-size: large; color:black">Insert your profile picture</a>
                        <br>
                        <div class="drop-zone">
                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                <input type="file" name="profileimg" class="drop-zone__input">
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="updateprofile"  type="button" data-bs-hover-animate="shake">Update</button>
                        </div>
                        <a href="." class="forgot" style="font-size: large;">Go back</a>
                        <hr>
                        <a href="change-password.php" class="forgot" style="font-size: large;">Change you password?</a>

                        <br>
                        
                        
                </form>
                
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets\js\drop-zone.js"></script>
        
        
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- <script src="assets/js/bs-animation.js"></script> -->
        </body>

</html>

