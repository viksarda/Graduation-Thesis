<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        echo 'Not logged in';
}

$token = $_COOKIE['SNID'];
$user_id = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
$username = DB::query('SELECT username FROM users WHERE id=:uid', array(':uid'=>$user_id))[0]['username'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viksagram</title>
    <link rel="icon" href="assets/img/Logoicon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <header class="hidden-sm hidden-md hidden-lg">
        <div class="searchbox">
            <form>
                <h1 class="text-left">Viksagram</h1>
                <div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                    <input class="form-control" type="text">
                </div>
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><?php echo $username; ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li role="presentation"><a href="<?php echo 'profile.php?username='.$username.''; ?>">My Profile</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href=".">Timeline </a></li>
                        <li role="presentation"><a href="messages.php">Messages </a></li>
                        <li role="presentation"><a href="notify.php">Notifications </a></li>
                        <li role="presentation"><a href="my-account.php">Update Profile</a></li>
                        <li role="presentation"><a href="logout.php">Logout </a></li>
                    </ul>
                </div>
            </form>
        </div>
        <hr>
    </header>
    <div>
        <nav class="navbar navbar-default hidden-xs navigation-clean">
            <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="."><img src="assets/img/Logocolor.png"></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <form class="navbar-form navbar-left">
                        <div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                            <input class="form-control" type="text">
                        </div>
                    </form>
                    <ul class="nav navbar-nav hidden-md hidden-lg navbar-right">
                        <li role="presentation"><a href=".">My Timeline</a></li>
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li role="presentation"><a href="<?php echo 'profile.php?username='.$username.''; ?>"><?php echo $username; ?></a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href=".">Timeline </a></li>
                                <li role="presentation"><a href="messages.php">Messages </a></li>
                                <li role="presentation"><a href="notify.php">Notifications </a></li>
                                <li role="presentation"><a href="my-account.php">Update Profile</a></li>
                                <li role="presentation"><a href="logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right">
                        <li role="presentation"><a href=".">Timeline</a></li>
                        <li role="presentation"><a href="messages.php">Messages</a></li>
                        <li class="active" role="presentation"><a href="notify.php">Notifications</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li role="presentation"><a href="<?php echo 'profile.php?username='.$username.''; ?>"><?php echo $username; ?></a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href=".">Timeline </a></li>
                                <li role="presentation"><a href="messages.php">Messages </a></li>
                                <li role="presentation"><a href="notify.php">Notifications </a></li>
                                <li role="presentation"><a href="my-account.php">Update Profile</a></li>
                                <li role="presentation"><a href="logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1>Notifications </h1></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
                      <?php
                      if (DB::query('SELECT * FROM notifications WHERE receiver=:userid', array(':userid'=>$userid))) {

                              $notifications = DB::query('SELECT * FROM notifications WHERE receiver=:userid ORDER BY id DESC', array(':userid'=>$userid));

                              foreach($notifications as $n) {

                                      if ($n['type'] == 1) {
                                              $senderName = DB::query('SELECT username FROM users WHERE id=:senderid', array(':senderid'=>$n['sender']))[0]['username'];

                                              if ($n['extra'] == "") {
                                                      echo "You got a notification!<hr/>";
                                              } else {
                                                      $extra = json_decode($n['extra']);
                                                      echo '<li class="list-group-item"><span>'.$senderName." mentioned you in a post! - ".$extra->postbody.'</span></li>';
                                              }

                                      } else if ($n['type'] == 2) {
                                              $senderName = DB::query('SELECT username FROM users WHERE id=:senderid', array(':senderid'=>$n['sender']))[0]['username'];
                                              echo '<li class="list-group-item"><span>'.$senderName.' liked your post!</span></li>';
                                      }

                              }

                      }
                      ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>
<div class="footer-dark">
        <footer>
            <div class="container">
                <p class="copyright">Vikagram © Graduation Thesis</p>
            </div>
        </footer>
    </div>

</html>
