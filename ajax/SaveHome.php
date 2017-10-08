<?php
    header('Access-Control-Allow-Origin: *');
    include('../db/connect.php');
    include("../functions/security.php");
    if(isset($_POST['HomeTitle'])&& isset($_POST['HomeSubtitle']))
    {
        $neworder=$_POST['ID'];
        $Title=escape($_POST['HomeTitle']);
        $Subtitle=escape($_POST['HomeSubtitle']);          
        $query="Update pages Set Title='$Title',Subtitle='$Subtitle',Created=NOW() Where Name='Home'";
        if(!$result=mysqli_query($db,$query))
            exit(mysqli_error($db));
        $neworder=json_decode($_POST['ID']);
        $counter=1;
        $j=0;
        $x=5;
        for($i=0;$i<=5;$i ++)
        {                   
            if($j==0)
            {
                $Id=(int)$neworder[$x];
                $NavName="Nav_".$Id;
                $j ++;
                $qry="Update navigation set OrderNo=$counter, Name='$_POST[$NavName]' where Id=".(int)$neworder[$x];
                if(!mysqli_query($db,$qry))
                    exit(mysqli_error($db));
                $counter ++;            
            }
            else
            {
                $x=$x+7;
                $Id=(int)$neworder[$x];
                $NavName="Nav_".$Id;
                $qry="Update navigation set OrderNo=$counter, Name='$_POST[$NavName]' where Id=".(int)$neworder[$x];
                if(!mysqli_query($db,$qry))
                    exit(mysqli_error($db));
                $counter ++;         
            }
        }
         echo $Id;
    } 
    else
        echo 0;
?>