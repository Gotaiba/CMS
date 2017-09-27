<?php

    /*require_once('functions/TweetPHP.php');
    $TweetPHP = new TweetPHP(array(
        'consumer_key'          => 'xx7NAetVegnj2SZ85oM4KRNN5',
        'consumer_secret'       => '4hxj5WSfzXYnjZ4tEtu9IhoBoDfq5QRvGq7Zlzvg3LgAPzmkQj',
        'access_token'          => '1264121424-nLlcwgIFfHyAymZQI1eQ6pJWlZW1JzFomkIlqd4',
        'access_token_secret'   => 'drrKraHKbhpIcRqlH3DV3avYx5DnK5VekWEaCFNituWGH',
        'twitter_screen_name'   => 'ECPP3',
    ));
    echo $TweetPHP->get_tweet_list();*/
    //$data = simplexml_load_file("https://twitter.com/ECPP3");
    //print_r($data);

?>
<html>
    <head>    
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/web.css">
    </head>
  <body>
    <!--<a id="linkage" href="http://www.jasonmayes.com/projects/twitterApi/" target="_blank">Visit my website</a>
    <h2>Query 1: My latest tweet</h2>
    <div id="example1"></div>-->
      <div class="example2">
        <div class="tweet"></div>
    </div>
      <a class="twitter-timeline" data-width="300" data-height="400" href="https://twitter.com/ECPP3">Tweets by ECPP3</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
   <a class="twitter-follow-button"
  href="https://twitter.com/ECPP3">
Follow @TwitterDev</a>

      <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/tweetie.min.js"></script>    
      <script type="text/javascript">
          $('.example2 .tweet').twittie({
            username: 'ECPP3',    
            dateFormat: '%b. %d, %Y',
            template: '{{avatar}} <strong class="date">{{date}}</strong> - {{screen_name}} {{tweet}}',
            count: 10
        }, function () {
            setInterval(function() {
                var item = $('.example2 .tweet ul').find('li:first');

                item.animate( {marginLeft: '-220px', 'opacity': '0'}, 500, function() {
                    $(this).detach().appendTo('.example2 .tweet ul').removeAttr('style');
                });
            }, 5000);
        });
      </script>
  </body>
</html>