<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (!Login::isLoggedIn()) {
        die("Not logged in.");
}

if (isset($_POST['confirm'])) {

        if (isset($_POST['alldevices'])) {

                DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
                header("Location: login.php");

        } else {
                if (isset($_COOKIE['SNID'])) {
                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
                }
                setcookie('SNID', '1', time()-3600);
                setcookie('SNID_', '1', time()-3600);
                header("Location: login.php");
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>

<link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body  style="background-color: #F1F7FC;">
<div class="login-clean">
        <form action="logout.php" method="post" >
                <h2 class="sr-only">Logout</h2>
                <div class="illustration"><img src="assets/img/Logo.png" style="max-width:60%"></i></div>
                        <hr>
                        <div class="form-group">
                                <div class="pretty p-default p-round p-smooth">
                                        <input type="checkbox" name="alldevices" value="alldevices">
                                        <div class="state p-primary">
                                        <label>Logout of all devices?</label>
                                </div>
                        </div>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="confirm" type="button" data-bs-hover-animate="shake">Confirm</button>
                </div>
                <a href="." class="forgot" style="font-size: large;">Go back</a>
        </form>
        
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="assets/js/bs-animation.js"></script> -->
</body>

</html>
