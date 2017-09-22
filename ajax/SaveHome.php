<?php
    header('Access-Control-Allow-Origin: *');
    include('../db/connect.php');
    if(isset($_POST['HomeTitle'])&& isset($_POST['HomeSubtitle']))
    {
        $Title=$_POST['HomeTitle'];
        $Subtitle=$_POST['HomeSubtitle'];
        $query="Update pages Set Title='$Title',Subtitle='$Subtitle',Created=NOW() Where Name='Home'";
        if(!$result=mysqli_query($db,$query))
            exit(mysqli_error($db));
        else
            echo 1;
    }
    else
        echo 0;
?>