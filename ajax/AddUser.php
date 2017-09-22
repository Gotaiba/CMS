<?php
    header('Access-Control-Allow-Origin: *');
    include('../functions/sendMail.php');
    if(isset($_POST["FName"]) && isset($_POST["LName"]) && isset($_POST['Usrname']) && isset($_POST['Password']) && isset($_POST['Email']))
    {
        include('../db/connect.php');
        $FName=trim($_POST['FName']);
        $LName=trim($_POST['LName']);
        $Email=strtolower($_POST['Email']);
        $Usrname=trim($_POST['Usrname']);
        $Password=$_POST['Password'];
        $Passwordmd5=md5($Password);
        $querychk="select * from users where Username='$Usrname'";
        if(!$chk=mysqli_query($db,$querychk))
        {
            exit(mysqli_error($db));
        }
        else if(mysqli_num_rows($chk)>0)
        {
            echo 2;
        }
        else
        {
            $query="Insert Into users(FirstName,LastName,Email,Username,Password,Created)
            Values('$FName','$LName','$Email','$Usrname','$Passwordmd5',NOW())";
            if(!$result=mysqli_query($db,$query))
            {
                exit(mysqli_error($db));
            }
            else
            {
                //SendingEmail($Email,$Usrname,$Password,$FName);
                echo 1;  
            }            
        }
    }
    else
    {
        echo 2;
    }

?>

