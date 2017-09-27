<?php
    require 'db/connect.php';
    require 'functions/security.php';
    
    $query= "Select * from articles where Id=4";  
    $result=mysqli_query($db,$query);
        
?>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/main.css"> 
</head>

<body>
    <?php
        require_once( 'facebook-php-sdk/src/facebook.php');
        $html="";
        $facebook = new Facebook(array(
            'appId'     => '1952910481645717',
            'secret'    => 'ea37af345a0953136aba9e261ce106cf'
        ));
        $pageId = 'ECPPuptodatepharmacist';
     $params=null;
        // this is redbull's page id
        // to establish your page id -> http://graph.facebook.com/redbull
     
        $feed =$facebook->api($pageId . '?fields=posts.limit(5){full_picture,created_time,link,message,picture}');
        //print_r($feed);
        foreach($feed as $posts)
        {
            if(is_array($posts))
            {
                foreach($posts as $key)
                {                   
                    if(is_array($key))
                    {
                        foreach($key as $post)
                        {
                            print_r($post);
                            $html.='<div><p>'.$post['message'].'</p>
                            <p>'.$post['link'].'</p>
                            <img src="'.$post['full_picture'].'"/>
                             <img src="'.$post['picture'].'"/>
                            </div>';
                        }
                    }
                }
            }
            else
                print_r($posts);
        }
        echo $html;
    ?>
        <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>