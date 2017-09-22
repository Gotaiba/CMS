<?php
    header('Access-Control-Allow-Origin: *');
    
    if(isset($_POST["CrsName"]) && isset($_POST["CrsDes"]) && isset($_POST['StartDate']) && isset($_POST['EndDate']) && isset($_FILES["CrsImg"]))
    {
        include('../db/connect.php');
        $CrsName=$_POST['CrsName'];
        $CrsDes=$_POST['CrsDes'];
        $StartDate=date('Y-m-d', strtotime($_POST['StartDate']));
        $EndDate=date('Y-m-d', strtotime($_POST['EndDate']));
        $Price=$_POST['CrsPrice'];
        $File=$_FILES['CrsImg']['name'];
        $FileName=$_FILES['CrsImg']['tmp_name'];   
        if(move_uploaded_file($FileName,'../uploads/'.$File))
        {
            $query="Insert Into courses(Name,ImageUrl,Description,StartDate,EndDate,Price,Posted)
            Values('$CrsName','../uploads/$File','$CrsDes','$StartDate','$EndDate','$Price',NOW())";
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