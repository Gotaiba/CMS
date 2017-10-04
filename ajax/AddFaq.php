<?php
    header('Access-Control-Allow-Origin: *');
    session_start();
    if(isset($_POST["QText"]) && isset($_POST["AnsText"]))
    {
        include('../db/connect.php');
        include("../functions/getUserInfo.php");
        include("../functions/security.php");
        $QText=escape($_POST['QText']);
        $AnsText=escape($_POST['AnsText']);     
        $user=getUserInfo($_SESSION['Id']);
        $query="Insert Into faq(Question,Answer,Username,Posted)
        Values('$QText','$AnsText','$user[3]',NOW())";
        if(!$result=mysqli_query($db,$query))
        {
            exit(mysqli_error($db));
        }
        else
            echo 1;      
    }
    else
    {
        echo 2;
    }

?>