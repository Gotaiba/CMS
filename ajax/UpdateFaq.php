<?php

    header('Access-Control-Allow-Origin: *');
   session_start();
    if(isset($_POST['QText']) && isset($_POST['AnsText']) && isset($_POST['FaqId']))
    {
        include("../db/connect.php");
        include("../functions/getUserInfo.php");
        $QText=$_POST['QText'];
        $AnsText=$_POST['AnsText'];   
        $Faq_Id=$_POST['FaqId'];
         $user=getUserInfo($_SESSION['Id']);
        if(!empty($QText) && !empty($AnsText) && !empty($Faq_Id))
        {
             $query="Update faq set Question='$QText', Username='$user[3]', Answer='$AnsText', Posted=NOW() Where Id='$Faq_Id'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
        else
            echo 0;
    }

?>