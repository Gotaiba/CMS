<?php

    header('Access-Control-Allow-Origin: *');
    if(isset($_POST['QText']) && isset($_POST['AnsText']) && isset($_POST['FaqId']))
    {
        include("../db/connect.php");
        $QText=$_POST['QText'];
        $AnsText=$_POST['AnsText'];   
        $Faq_Id=$_POST['FaqId'];
        if(!empty($QText) && !empty($AnsText) && !empty($Faq_Id))
        {
             $query="Update faq set Question='$QText', Answer='$AnsText', Posted=NOW() Where Id='$Faq_Id'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
        else
            echo 0;
    }

?>