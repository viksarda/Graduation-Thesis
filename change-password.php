<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Mail.php');
$tokenIsValid = False;
if (Login::isLoggedIn()) {

        if (isset($_POST['changepassword'])) {

                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                $newpasswordrepeat = $_POST['newpasswordrepeat'];
                $userid = Login::isLoggedIn();

                if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])) {

                        if ($newpassword == $newpasswordrepeat) {

                                if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {

                                        DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                        header("Location: login.php");
                                }

                        } else {
                                echo 'Passwords don\'t match!';
                        }

                } else {
                        echo 'Incorrect old password!';
                }

        }

} else {
        if (isset($_GET['token'])) {
        $token = $_GET['token'];
        if (DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))) {
                $userid = DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
                $tokenIsValid = True;
                if (isset($_POST['changepassword'])) {

                        $newpassword = $_POST['newpassword'];
                        $newpasswordrepeat = $_POST['newpasswordrepeat'];

                                if ($newpassword == $newpasswordrepeat) {

                                        if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {

                                                DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
                                                Mail::sendMail('Successfully changed password!', '', $email);
                                                DB::query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
                                                header("Location: login.php");
                                        }

                                } else {
                                        echo 'Passwords don\'t match!';
                                }

                        }


        } else {
                die('Token invalid');
        }
} else {
        die('Not logged in');
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
                <form action="<?php if (!$tokenIsValid) { echo 'change-password.php'; } else { echo 'change-password.php?token='.$token.''; } ?>" method="post">
                        <h2 class="sr-only">Change your Password</h2>
                        <div class="illustration"><img src="assets/img/Logo.png" style="max-width:60%"></i></div>
                        <hr>
                                <?php if (!$tokenIsValid) { echo '   <div class="form-group"> <input class="form-control" type="password"  value="" name="oldpassword" placeholder="Current Password"><p /> </div>'; } ?>
                        <div class="form-group">
                                <input class="form-control" type="password"  value="" name="newpassword" placeholder="New Password">
                        </div>
                        <div class="form-group">
                                <input class="form-control" type="password"  value="" name="newpasswordrepeat" placeholder="Repeat Password">
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="changepassword" type="button" data-bs-hover-animate="shake">Change Password</button>
                        </div>
                        <br>
                </form>
                
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- <script src="assets/js/bs-animation.js"></script> -->
        </body>

</html>
