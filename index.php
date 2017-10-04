<?php

    session_start();    
    include("functions/addWebViews.php");
    include ('db/connect.php');
    IncreaseWebViews();
    $nowDate=Date('Y-m-d');
    $query="Select * from navigation order by OrderNo";
    $nav=mysqli_query($db,$query);
    $query="Select * from pages";
    $pages=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc($pages))
    {
        $pages_content[]=$row['Name'];
        $pages_content[]=$row['ImageUrl'];
        $pages_content[]=$row['Content'];
        $pages_content[]=$row['Title'];
        $pages_content[]=$row['Subtitle'];
    }
    $query="Select * from events where IsDeleted=0 And StartDate>='$nowDate' order by StartDate Desc limit 3";
    $evt=mysqli_query($db,$query);
    $query="Select * from courses where IsDeleted=0 And StartDate>='$nowDate' order by StartDate Desc limit 9";
    $crs=mysqli_query($db,$query);
    $query="Select * from articles where IsDeleted=0 And Posted<='$nowDate' order by Posted Desc limit 5";
    $art=mysqli_query($db,$query);
    $query="Select * from faq Where IsDeleted=0 And Posted<='$nowDate' order by Posted Desc";
    $faq=mysqli_query($db,$query);    
    
    
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

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1973020379608688";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
     <header id="top">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid text-center">              
                <div class="navbar-header">
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
                    <ul class="nav navbar-nav">
                        <?php
                            while($row=mysqli_fetch_assoc($nav))
                            {
                                echo '<li><a href="'.$row['PageUrl'].'">'.$row['Name'].'</a></li>';
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
        <div class="container-fluid">   
            <div class="row title-row" id="for-shrink">
                <div class="fill-screen" style="background-image: url(img/bg.jpg);">
                    <div class="title-img">
                        <h2>Weclome to</h2>                    
                    </div>
                     <div class="down-btn bouncecus">
                        <a class="btn" href="#About">
                            <i class="fa fa-chevron-down fa-4x"></i>
                        </a>
                    </div>
                    <div class="main-title wow fadeInUp" data-wow-delay="1.2s">                     
                         <h3><?php echo html_entity_decode($pages_content[8])?></h3>
                            <p><?php echo html_entity_decode($pages_content[9])?></p>
                    </div>
                    <div class="events-section wow fadeInUp" data-wow-delay="1.3s">
                        <h2>Upcoming Events</h2>
                        <ul>
                            <?php
                                $i=0;
                                while($row=mysqli_fetch_assoc($evt))
                                {
                                    $i ++;
                                    echo '<li>';
                                    echo '<div class="row">';
                                    echo '<div class="col-xs-3 no-padding text-right">';
                                    echo '<img src="img/date'.$i.'.png" height="50"/>';
                                    echo '</div>';
                                    echo '<div class="col-xs-9 no-padding">';
                                    echo '<a href="allEvents.php"><p class="event-title">'.html_entity_decode($row['Name']).'</p></a>';
                                    echo '<p class="event-date">';
                                    echo '<i>'.$row['StartDate'].'</i></p></div></div></li>';
                                }
                            ?>
                           <!-- <li>
                                <div class="row">
                                    <div class="col-xs-3 no-padding text-right">
                                        <img src="img/date1.png" height="50"/>
                                    </div>
                                    <div class="col-xs-9 no-padding">
                                        <a href="#"><span class="event-title">The first event of the year</span></a>
                                        <span class="event-date">
                                           <i>24 septemper 2017</i>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3 no-padding text-right">
                                        <img src="img/date2.png" height="50"/>
                                    </div>
                                    <div class="col-md-9 no-padding">
                                        <a href="#"><span class="event-title">The first event of the year to know what we are</span></a>
                                        <span class="event-date">
                                            <i>24 septemper 2017</i>
                                        </span>
                                    </div>
                                </div>
                            </li>
                             <li>
                                <div class="row">
                                    <div class="col-md-3 no-padding text-right">
                                        <img src="img/date3.png" height="50"/>
                                    </div>
                                    <div class="col-md-9 no-padding">
                                        <a href="#"><span class="event-title">The first event of the year</span></a>
                                        <span class="event-date">
                                            <i>24 septemper 2017</i>
                                        </span>
                                    </div>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>    
            <div class="row content-filler" id="About">
                 <div class="col-md-6 text-center wow fadeInUp">
                    <h1><?php echo html_entity_decode($pages_content[3])?></h1>
                </div>
                <div class="col-md-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h2><?php echo html_entity_decode($pages_content[4])?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="about-img wow fadeInUp" data-wow-delay="0.2s">
                        
                       <?php echo '<img src="'.$pages_content[1].'" alt="About ECPP"/>'?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about-text">
                        <?php echo html_entity_decode($pages_content[2])?>                        
                    </div>
                   
                </div>
            </div>
            <!-- This is Courses Section -->
            <div class="row content-filler" id="Courses">
                <div class="col-md-6 text-center wow fadeInUp">
                    <h1><?php echo html_entity_decode($pages_content[13])?></h1>
                </div>
                <div class="col-md-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h2><?php echo html_entity_decode($pages_content[14])?></h2>
                </div>
            </div>        
            <div class="row">
                <div class="col-md-12 no-padding">  
                    <?php
                        echo '<div class="crs-img" style="background-image: url('.$pages_content[11].');">  
                        <div class="overlay wow fadeInUp" data-wow-delay="0.2s">
                            '.html_entity_decode($pages_content[12]).'
                        </div>                        
                    </div>';
                    ?>
                    <!--<div class="crs-img" style="background-image: url(img/bg.jpg);">  
                        <div class="overlay">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                        </div>                        
                    </div> -->          
                </div>            
                <div class="col-xs-12 courses">
                    <?php
                        while($row=mysqli_fetch_assoc($crs))
                        {    
                             $len=html_entity_decode($row['Description']);
                            if(strlen($len)>180)
                            {
                                $len=substr($len,0,180);
                                $len.=" ...";
                            }
                            $price=strval($row['Price']);
                            if($price=="0")
                                $price="Contact Us For Enrollment"; 
                            else
                                $price=number_format($price).' <i class="fa fa-dollar"></i>';
                        echo '<div class="col-md-3 col-sm-3 no-padding crs wow fadeInUp" data-wow-delay="0.2s"><div class="crs-thum" style="background-image: url('.$row['ImageUrl'].');"><a class="viewimg" href="http://localhost/cms/'.$row['ImageUrl'].'"></a></div>
                                    <span>'.$price.'</span>
                                    <div class="crs-content">
                                        <h2>'.html_entity_decode($row['Name']).'</h2>
                                        <span><i>'.$row['StartDate'].' <i class="fa fa-long-arrow-right"></i> '.$row['EndDate'].'</i></span>
                                        '.$len.'
                                        <a href="getCourse.php?Id='.$row['Id'].'">Read More</a>
                                        </div>
                                    </div>';
                        }
                    ?>
                    <div class="col-md-12 text-center">
                        <div class="btn-crs">
                            <a href="allcourses.php" class="btn btn-block btn-default btn-all">See All Courses</a>
                        </div>                    
                    </div>
                </div>
            </div>
            <!-- End of Courses Section -->
            
            <!-- This is Library Section -->
            <div class="row content-filler" id="Library">
                <div class="col-md-6 text-center wow fadeInUp">
                    <h1><?php echo html_entity_decode($pages_content[18])?></h1>
                </div>
                <div class="col-md-6 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h2><?php echo html_entity_decode($pages_content[19])?></h2>
                </div>
            </div>
            <div class="row">
                  <div class="col-md-12 no-padding">  
                    <?php
                        echo '<div class="crs-img" style="background-image: url('.$pages_content[16].');">  
                        <div class="overlay wow fadeInUp" data-wow-delay="0.4s">
                            '.html_entity_decode($pages_content[17]).'
                        </div>                        
                    </div>';
                    ?>                          
                </div>            
                <div class="col-lg-12 text-center">
                    <?php
                        while($row=mysqli_fetch_assoc($art))
                        {
                            $len=html_entity_decode($row['ArticleText']);
                            if(strlen($len)>350)
                            {
                                $len=substr($len,0,350);
                                $len.=" ...";
                            }
                            echo ' <div class="col-md-10 col-md-offset-1 lib-main wow fadeInUp" data-wow-delay="0.3s">
                        <div class="col-md-3">
                        <div class="lib-img">
                            <img src="'.$row['ImageUrl'].'" />
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="lib-content">
                            <h2>'.html_entity_decode($row['Title']).'</h2>
                            '.$len.'
                            <a href="getLibrary.php?Id='.$row['Id'].'">Read More</a>
                        </div>
                    </div>
                    </div>';
                        }
                    ?>                                                   
                    <div class="col-md-12 text-center">
                        <div class="btn-crs">
                            <a href="allLibrary.php" class="btn btn-block btn-default btn-all">See All Articles</a>
                        </div>                    
                    </div>
                </div>
            </div>
            <!-- End of Library Section -->
            
             <!-- This is FAQ Section -->
            <div class="row content-filler" id="Faq">
                <div class="col-md-6 text-center wow fadeInUp">
                    <h1>FAQ</h1>
                </div>
                <div class="col-md-6 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-9">
                        <div class="main-faq">
                            <?php
                                while($row=mysqli_fetch_assoc($faq))
                                {
                                    echo '<div class="faq">
                                 <div class="question">
                                    <a href="getFaq.php?Id='.$row['Id'].'">'.html_entity_decode($row['Question']).'?</a>
                                </div>
                                '.html_entity_decode($row['Answer']).'
                            </div>';
                                }
                            ?>                        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="faq-img wow fadeInUp">                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of FAQ Section -->
            
             <!-- This is Contact Us Section -->
            <div class="row content-filler" id="Contact">
                <div class="col-md-6 text-center wow fadeInUp">
                    <h1>Contact Us</h1>
                </div>
                <div class="col-md-6 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h2>Send to us </h2>
                </div>
            </div>
            <div class="row top-space">
                <div class="col-md-3">
                    <div class="social-content wow fadeInUp" id="container">
                       <!-- <h3>Our Facebook Page</h3>
                        <div class="fb-page" data-href="https://www.facebook.com/ECPPuptodatepharmacist/" data-tabs="timeline" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ECPPuptodatepharmacist/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ECPPuptodatepharmacist/">Excellence in Clinical Pharmacy Practice - ECPP</a></blockquote></div>  -->
                    </div>                              
                </div>
                <div class="col-md-3">
                    <div class="social-content wow fadeInUp" data-wow-delay="0.1s">
                        <h3>Our Twitter Page</h3>
                        <a class="twitter-timeline" data-chrome="nofooter" data-width="100%" data-height="400" href="https://twitter.com/ECPP3">Tweets by ECPP3</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>      
                    </div>
                </div>
                <div class="col-md-6">     
                    <div class="sendtoUs wow fadeInUp" data-wow-delay="0.5s">
                        <h3>Talk to Us</h3>                        
                        <div class="col-md-12 no-padding contact-info">
                            <input type="text" id="Name" name="Name" class="form-control contact-text" placeholder="Tell us you name"/>
                        </div>
                        <div class="col-md-12 no-padding contact-info">
                            <input type="text" id="Email" name="Email" class="form-control contact-text" placeholder="What is your Email"/>
                        </div>
                        <div class="col-md-12 no-padding">
                            <textarea rows="10" id="Msg" name="Msg" placeholder="Write to us" class="form-control contact-text"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="send">
                                <button type="button" onclick="postUserInfo()" class="btn btn-circle btn-send"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                            </div>                    
                        </div>  
                    </div>                                  
                </div>
            </div>
            <!-- End of Contact Us Section -->
        </div>
     <footer class="container-fluid">
        <div class="row">
         <div class="col-sm-4">
                <h3>Useful links</h3>
                <ul class="nav-menu">
                    <li class="wow fadeInUp"><a href="#top">Home</a></li>
                    <li class="wow fadeInUp"><a href="#About">About Us</a></li>
                    <li class="wow fadeInUp"><a href="#Courses">Online Courses</a></li>
                    <li class="wow fadeInUp"><a href="allcourses.php">All Courses</a></li>
                    <li class="wow fadeInUp"><a href="#Library">Library</a></li>
                    <li class="wow fadeInUp"><a href="allEvents.php">Events</a></li>
                    <li class="wow fadeInUp"><a href="#Faq">FAQ</a></li>
                    <li class="wow fadeInUp"><a href="#Contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-4">         
                <ul class="footer-ul inline-dis rotate">
                    <li class="facebook wow fadeInUp">
                        <a href="https://www.facebook.com/ECPPuptodatepharmacist/"><i class="fa fa-facebook-official fa-2x"></i></a>
                    </li>
                    <li class="google wow fadeInUp">
                        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
                    </li>
                    <li class="twitter wow fadeInUp">
                        <a href="https://twitter.com/ECPP3"><i class="fa fa-twitter fa-2x"></i></a>
                    </li>
                    <li class="insta wow fadeInUp">
                        <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">                  
                <div class="social-btns wow fadeInUp">
                    <p> <i class="fa fa-envelope-open-o" aria-hidden="true"></i> info@ecpp-ph.com</p>
                    <p><a class="twitter-follow-button" href="https://twitter.com/ECPP3">Follow @ECPP3</a></p>
                    <div class="fb-like" data-href="https://www.facebook.com/ECPPuptodatepharmacist/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                </div>               
            </div>
        </div>
         <div class="copyright">Copyright &copy; 2017 ECPP. All rights reserved. Designed by <a href="http://quick-picker.com" target="_blank">Quick Picker</a></div>
    </footer>
     <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/web.js"></script>
    <script type="text/javascript">    
        jQuery(document).ready(function($) {
  $(window).bind("load resize", function(){  
  setTimeout(function() {
  var container_width = $('#container').width();    
    $('#container').html(' <h3>Our Facebook Page</h3><div class="fb-page" ' + 
    'data-href="http://www.facebook.com/ECPPuptodatepharmacist"' +
    ' data-width="' + container_width + '" data-tabs="timeline" data-small-header="true" data-height="400" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="http://www.facebook.com/ECPPuptodatepharmacist"><a href="http://www.facebook.com/ECPPuptodatepharmacist">Excellence in Clinical Pharmacy Practice - ECPP</a></blockquote></div></div>');
    FB.XFBML.parse();    
  }, 100);  
}); 
});
    </script>
    </body>
</html>