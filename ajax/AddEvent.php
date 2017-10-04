<?php
    header('Access-Control-Allow-Origin: *');
    session_start();
    if(isset($_POST["EvtName"]) && isset($_POST["EvtDes"]) && isset($_POST['StartDate']) && isset($_POST['EndDate']) && isset($_FILES["EvtImg"]))
    {
        include('../db/connect.php');
        include("../functions/getUserInfo.php");
        include("../functions/security.php");
        $EvtName=escape($_POST['EvtName']);
        $EvtDes=escape($_POST['EvtDes']); 
        $StartDate=date('Y-m-d', strtotime($_POST['StartDate']));
        $EndDate=date('Y-m-d', strtotime($_POST['EndDate']));       
        $File=$_FILES['EvtImg']['name'];
        $FileName=$_FILES['EvtImg']['tmp_name'];   
        $user=getUserInfo($_SESSION['Id']);
        if(move_uploaded_file($FileName,'../uploads/'.$File))
        {
            $query="Insert Into events(Name,ImageUrl,Description,StartDate,EndDate,Username,Posted)
            Values('$EvtName','uploads/$File','$EvtDes','$StartDate','$EndDate','$user[3]',NOW())";
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