<?php

    header('Access-Control-Allow-Origin: *');
   if(isset($_POST["EvtName"]) && isset($_POST["EvtDes"]) && isset($_POST['StartDate']) && isset($_POST['EndDate']) && isset($_POST['EventId']))
    {
        include("../db/connect.php");
       $EvtName=$_POST['EvtName'];
        $EvtDes=$_POST['EvtDes'];
        $EvtId=$_POST['EventId'];
        $StartDate=date('Y-m-d', strtotime($_POST['StartDate']));
        $EndDate=date('Y-m-d', strtotime($_POST['EndDate']));
        $file=$_FILES['EvtImg']['name'];
        $file_name=$_FILES['EvtImg']['tmp_name'];   
        if(!empty($file))
        {  
            if(move_uploaded_file($file_name,"../uploads/$file"))
            {
                $query="Update events set Name='$EvtName', Description='$EvtDes', ImageUrl='../uploads/$file', StartDate='$StartDate', EndDate='$EndDate', Posted=NOW() Where Id='$EvtId'";
                if(!$result=mysqli_query($db,$query))                
                    exit(mysqli_error($db));                
                else                
                    echo 1;                
            }
            else            
                echo 0;            
        }
        else
        {
            $query="Update courses set Name='$EvtName', Description='$EvtDes', StartDate='$StartDate', EndDate='$EndDate', Posted=NOW() Where Id='$EvtId'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
    }

?>