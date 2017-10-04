<?php

    session_start();
    include("functions/addWebViews.php"); 
    IncreaseWebViews();
    include ('db/connect.php'); 
    $query="Select * from navigation order by OrderNo";
    $nav=mysqli_query($db,$query);    

?>
<!DOCTYPE html>
<html>
<head>
    <title>ECPP</title>
    <!--[if IE]><link rel="shortcut icon" href="path/to/favicon.ico"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Quicksand:300,400,500,700|Raleway:400,700,800" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/web.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
</head>

<body>
    <div id="loading">
  <img id="loading-image" src="img/ajax-loading.gif" alt="Loading..." />
</div>
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1973020379608688";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
     <header id="top">
        <nav class="navbar navbar-default navbar-fixed-top navbar-default-bg logo-shrink">
            <div class="container-fluid text-center">              
                <div class="navbar-header push-logo-right">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#top">
                        <img src="img/logo.png" alt="ECPP Logo"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-margin-top">
                        <?php
                            while($row=mysqli_fetch_assoc($nav))
                            {
                                echo '<li><a href="index.php'.$row['PageUrl'].'">'.$row['Name'].'</a></li>';
                            }
                            
                        ?>
                       <!-- <li><a href="#top">Home</a></li>
                        <li><a href="#About">About Us</a></li>
                        <li><a href="#Courses">Online Courses</a></li>
                        <li><a href="#Library">Library</a></li>
                        <li><a href="#Faq">FAQ</a></li>
                        <li><a href="#Contact">Contact Us</a></li>-->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>