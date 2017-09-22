<?php
    header('Access-Control-Allow-Origin: *');
    
    if(isset($_POST["QText"]) && isset($_POST["AnsText"]))
    {
        include('../db/connect.php');
        $QText=$_POST['QText'];
        $AnsText=$_POST['AnsText'];        
        $query="Insert Into faq(Question,Answer,Posted)
        Values('$QText','$AnsText',NOW())";
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