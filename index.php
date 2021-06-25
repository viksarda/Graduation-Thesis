<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Post.php');
include('./classes/Image.php');
include('./classes/Notify.php');


if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        header("Location: login.php");
}

$token = $_COOKIE['SNID'];
$user_id = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
$username = DB::query('SELECT username FROM users WHERE id=:uid', array(':uid'=>$user_id))[0]['username'];

if (isset($_POST['searchbox'])) {
        $tosearch = explode(" ", $_POST['searchbox']);
        if (count($tosearch) == 1) {
                $tosearch = str_split($tosearch[0], 2);
        }
        $whereclause = "";
        $paramsarray = array(':username'=>'%'.$_POST['searchbox'].'%');
        for ($i = 0; $i < count($tosearch); $i++) {
                $whereclause .= " OR username LIKE :u$i ";
                $paramsarray[":u$i"] = $tosearch[$i];
        }
        $users = DB::query('SELECT users.username FROM users WHERE users.username LIKE :username '.$whereclause.'', $paramsarray);
        print_r($users);
    
        $whereclause = "";
        $paramsarray = array(':body'=>'%'.$_POST['searchbox'].'%');
        for ($i = 0; $i < count($tosearch); $i++) {
                if ($i % 2) {
                $whereclause .= " OR body LIKE :p$i ";
                $paramsarray[":p$i"] = $tosearch[$i];
                }
        }
    }

    if (isset($_POST['searchboxusers'])) {
        $tosearch = explode(" ", $_POST['searchboxusers']);
        if (count($tosearch) == 1) {
                $tosearch = str_split($tosearch[0], 2);
        }
        $whereclause = "";
        $paramsarray = array(':username'=>'%'.$_POST['searchboxusers'].'%');
        for ($i = 0; $i < count($tosearch); $i++) {
                $whereclause .= " OR username LIKE :u$i ";
                $paramsarray[":u$i"] = $tosearch[$i];
        }
        $users = DB::query('SELECT users.username FROM users WHERE users.username LIKE :username '.$whereclause.'', $paramsarray);
        print_r($users);
        for ($i = 0; $i < count($tosearch); $i++) {
                if ($i % 2) {
                $whereclause .= " OR username LIKE :p$i ";
                $paramsarray[":p$i"] = $tosearch[$i];
                }
        }
 
    }

    if (isset($_POST['bt']))
{
    header("Location: ../viksagram2.0/profile.php?username=" . $_POST['folder']);
}

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viksagram</title>
    <link rel="icon" href="assets/img/Logoicon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
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
                    <input class="form-control sbox" type="text">
                    <ul class="list-group autocomplete" style="position:absolute;width:100%; z-index: 100">
                    </ul>
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
                            <input class="form-control sbox" type="text">
                            <ul class="list-group autocomplete" style="position:absolute;width:100%; z-index:100">
                            </ul>
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
                        <li class="active" role="presentation"><a href=".">Timeline</a></li>
                        <li role="presentation"><a href="messages.php">Messages</a></li>
                        <li role="presentation"><a href="notify.php">Notifications</a></li>
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

        <div class="container" style="position: relative; min-height: 80vh;">     
                <div class="row"></div>
                <div class="col-md-3">
                                        <br>
                                        <br>
                                        <div >
                                        <h3>Find other users</h3>
                                        </div>
                                        <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <input type="text" name="folder" id="folder" class="form-control"/>
                                                <input type="submit" name="bt" id="bt" value="Go To" style=" visibility: hidden;"/>
                                        </form>
                                        

                                </div>
                        <div class="col-md-8">
                                <h1>Timeline </h1>
                                <div class="timelineposts">
                                </div>  
                        </div>
                              
                                
        </div>
        


   

    <div class="footer-dark navbar-fixed-bottom" style="position: static; z-index:-1; bottom: 0;">
        <footer>
            <div class="container">
                <p class="copyright">Viksagram © Graduation Thesis</p>
            </div>
        </footer>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets\js\usersearch.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script type="text/javascript">

    var working = false;
    $(window).scroll(function() {
            if ($(this).scrollTop() + 1 >= $('body').height() - $(window).height()) {
                    if (working == false) {
                            working = true;
                            $.ajax({

                                    type: "GET",
                                    url: "api/posts&start="+start,
                                    processData: false,
                                    contentType: "application/json",
                                    data: '',
                                    success: function(r) {
                                            var posts = JSON.parse(r)
                                            $.each(posts, function(index) {

                                                    if (posts[index].PostImage == "") {

                                                            $('.timelineposts').html(
                                                                    $('.timelineposts').html() +

                                                                    '<li class="list-group-item" id="'+posts[index].PostId+'"><blockquote><p>'+posts[index].PostBody+'</p><footer>Posted by '+posts[index].PostedBy+' on '+posts[index].PostDate+'<button class="btn btn-default" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;" data-id=\"'+posts[index].PostId+'\"> <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+posts[index].Likes+' Likes</span></button></footer></blockquote></li>'
                                                            )
                                                    } else {
                                                            $('.timelineposts').html(
                                                                    $('.timelineposts').html() +

                                                                    '<li class="list-group-item" id="'+posts[index].PostId+'"><blockquote><p>'+posts[index].PostBody+'</p><img src="" data-tempsrc="'+posts[index].PostImage+'" class="postimg" id="img'+posts[index].postId+'"><footer>Posted by '+posts[index].PostedBy+' on '+posts[index].PostDate+'<button class="btn btn-default" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;" data-id=\"'+posts[index].PostId+'\"> <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+posts[index].Likes+' Likes</span></button></footer></blockquote></li>'
                                                            )
                                                    }

                                                    $('[data-id]').click(function() {
                                                            var buttonid = $(this).attr('data-id');
                                                            $.ajax({

                                                                    type: "POST",
                                                                    url: "api/likes?id=" + $(this).attr('data-id'),
                                                                    processData: false,
                                                                    contentType: "application/json",
                                                                    data: '',
                                                                    success: function(r) {
                                                                            var res = JSON.parse(r)
                                                                            $("[data-id='"+buttonid+"']").html(' <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+res.Likes+' Likes</span>')
                                                                    },
                                                                    error: function(r) {
                                                                            console.log(r)
                                                                    }

                                                            });
                                                    })
                                            })

                                            $('.postimg').each(function() {
                                                    this.src=$(this).attr('data-tempsrc')
                                                    this.onload = function() {
                                                            this.style.opacity = '1';
                                                    }
                                            })

                                            scrollToAnchor(location.hash)

                                            start+=8;
                                            setTimeout(function() {
                                                    working = false;
                                            }, 4000)

                                    },
                                    error: function(r) {
                                            console.log(r)
                                    }

                            });
                    }
            }
    })

    function scrollToAnchor(aid){
    try {
    var aTag = $(aid);
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
        } catch (error) {
                console.log(error)
        }
    }

        $(document).ready(function() {
                
                $('.sbox').keyup(function() {
                        $('.autocomplete').html("")
                        $.ajax({

                                type: "GET",
                                url: "api/search?query=" + $(this).val(),
                                processData: false,
                                contentType: "application/json",
                                data: '',
                                success: function(r) {
                                        r = JSON.parse(r)
                                        for (var i = 0; i < r.length; i++) {
                                                console.log(r[i].body)
                                                $('.autocomplete').html(
                                                        $('.autocomplete').html() +
                                                        '<a href="profile.php?username='+r[i].username+'#'+r[i].id+'"><li class="list-group-item"><span>'+r[i].body+'</span></li></a>'
                                                )
                                        }
                                },
                                error: function(r) {
                                        console.log(r)
                                }
                        })
                })

                $('.sboxusers').keyup(function() {
                        $('.autocompleteusers').html("")
                        $.ajax({

                                type: "GET",
                                url: "api/search?query=" + $(this).val(),
                                processData: false,
                                contentType: "application/json",
                                data: '',
                                success: function(r) {
                                        r = JSON.parse(r)
                                        for (var i = 0; i < r.length; i++) {
                                                console.log(r[i].username)
                                                $('.autocompleteusers').html(
                                                        $('.autocompleteusers').html() +
                                                        '<a href="profile.php?username='+r[i].username+'#'+'"><li class="list-group-item"><span>'+r[i].username+'</span></li></a>'
                                                )
                                        }
                                },
                                error: function(r) {
                                        console.log(r)
                                }
                        })
                })


                $.ajax({

                        type: "GET",
                        url: "api/posts&start=0",
                        processData: false,
                        contentType: "application/json",
                        data: '',
                        success: function(r) {
                                var posts = JSON.parse(r)
                                $.each(posts, function(index) {

                                        if (posts[index].PostImage == "") {

                                                $('.timelineposts').html(
                                                        $('.timelineposts').html() +

                                                        '<li class="list-group-item" id="'+posts[index].PostId+'"><blockquote><p>'+posts[index].PostBody+'</p><footer>Posted by '+posts[index].PostedBy+' on '+posts[index].PostDate+'<button class="btn btn-default" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;" data-id=\"'+posts[index].PostId+'\"> <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+posts[index].Likes+' Likes</span></button></footer></blockquote></li>'
                                                )
                                        } else {
                                                $('.timelineposts').html(
                                                        $('.timelineposts').html() +

                                                        '<li class="list-group-item" id="'+posts[index].PostId+'"><blockquote ><p >'+posts[index].PostBody+'</p><hr><br><img src="" data-tempsrc="'+posts[index].PostImage+'" class="postimg" id="img'+posts[index].postId+'"><footer>Posted by '+posts[index].PostedBy+' on '+posts[index].PostDate+'<button class="btn btn-default" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;" data-id=\"'+posts[index].PostId+'\"> <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+posts[index].Likes+' Likes</span></button></footer></blockquote></li>'
                                                )
                                        }

                                        $('[data-id]').click(function() {
                                                var buttonid = $(this).attr('data-id');
                                                $.ajax({

                                                        type: "POST",
                                                        url: "api/likes?id=" + $(this).attr('data-id'),
                                                        processData: false,
                                                        contentType: "application/json",
                                                        data: '',
                                                        success: function(r) {
                                                                var res = JSON.parse(r)
                                                                $("[data-id='"+buttonid+"']").html(' <i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span> '+res.Likes+' Likes</span>')
                                                        },
                                                        error: function(r) {
                                                                console.log(r)
                                                        }

                                                });
                                        })
                                })

                                $('.postimg').each(function() {
                                        this.src=$(this).attr('data-tempsrc')
                                        this.onload = function() {
                                                this.style.opacity = '1';
                                        }
                                })

                                scrollToAnchor(location.hash)

                        },
                        error: function(r) {
                                console.log(r)
                        }

                });

        });

        function showNewPostModal() {
                $('#newpost').modal('show')
        }

    </script>
</body>


