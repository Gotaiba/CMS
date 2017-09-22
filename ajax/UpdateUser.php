<?php

    header('Access-Control-Allow-Origin: *');
    if(isset($_POST["FName"]) && isset($_POST["LName"]) && isset($_POST['Usrname']) && isset($_POST['UserId']) && isset($_POST['Email']))
    {
        include("../db/connect.php");
       $FName=$_POST['FName'];
        $LName=$_POST['LName'];
        $Email=$_POST['Email'];
        $Usrname=$_POST['Usrname'];
        $UsrId=$_POST['UserId'];
        if(!empty($FName) && !empty($LName) && !empty($Email) && !empty($Usrname) && !empty($UsrId))
        {
             $query="Update users set FirstName='$FName', LastName='$LName',Email='$Email',Username='$Usrname' Where Id='$UsrId'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
        else
            echo 0;
    }

?>