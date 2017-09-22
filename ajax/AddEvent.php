<?php
    header('Access-Control-Allow-Origin: *');
    
    if(isset($_POST["EvtName"]) && isset($_POST["EvtDes"]) && isset($_POST['StartDate']) && isset($_POST['EndDate']) && isset($_FILES["EvtImg"]))
    {
        include('../db/connect.php');
        $EvtName=$_POST['EvtName'];
        $EvtDes=$_POST['EvtDes'];
        $StartDate=date('Y-m-d', strtotime($_POST['StartDate']));
        $EndDate=date('Y-m-d', strtotime($_POST['EndDate']));       
        $File=$_FILES['EvtImg']['name'];
        $FileName=$_FILES['EvtImg']['tmp_name'];   
        if(move_uploaded_file($FileName,'../uploads/'.$File))
        {
            $query="Insert Into events(Name,ImageUrl,Description,StartDate,EndDate,Posted)
            Values('$EvtName','../uploads/$File','$EvtDes','$StartDate','$EndDate',NOW())";
            if(!$result=mysqli_query($db,$query))
            {
                exit(mysqli_error($db));
            }
            else
                echo 1;
        }
        else
        {
            echo 0;
        }
    }
    else
    {
        echo 0;
    }

?>