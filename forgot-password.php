<?php
include('./classes/DB.php');
include('./classes/Mail.php');



if (isset($_POST['resetpassword'])) {

        $cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $email = $_POST['email'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
                $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];


                DB::query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                Mail::sendMail('Forgot Password!', "<a href='http://localhost/viksagram2.0/change-password.php?token=$token'>Click the following link to change your password. http://localhost/viksagram2.0/change-password.php?token=$token</a>", $email);
                echo '<script>alert("Email Sent!")</script>';

           
        } else {
                echo 'Email doesn\'t exist!';
        }
        }else {
                echo 'Invalid Email!';
        }

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
        <div class="login-clean">
                <form action="forgot-password.php" method="post">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="illustration"><img src="assets/img/Logo.png" style="max-width:60%"></i></div>
                        <hr>
                        <a href="forgot-password.php" class="forgot" style="font-size: large;">Forgot your email or password?</a>
                        <br>
                        <div class="form-group">
                                
                                <input class="form-control" type="text"  name="email" placeholder="Enter your email">
                        </div>
                        
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="resetpassword"  type="button" data-bs-hover-animate="shake">Reset Password</button>
                        </div>
                        <br>
                        <a href="login.php" class="forgot" style="font-size: large;">Go back</a>

                     
                </form>
                
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- <script src="assets/js/bs-animation.js"></script> -->
        </body>

</html>
