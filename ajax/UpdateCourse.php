<?php

    header('Access-Control-Allow-Origin: *');
   if(isset($_POST["CrsName"]) && isset($_POST["CrsDes"]) && isset($_POST['StartDate']) && isset($_POST['EndDate']) && isset($_POST['CourseId']))
    {
        include("../db/connect.php");
       $CrsName=$_POST['CrsName'];
        $CrsDes=$_POST['CrsDes'];
        $CrsId=$_POST['CourseId'];
        $StartDate=date('Y-m-d', strtotime($_POST['StartDate']));
        $EndDate=date('Y-m-d', strtotime($_POST['EndDate']));
        $Price=$_POST['CrsPrice'];
        $file=$_FILES['CrsImg']['name'];
        $file_name=$_FILES['CrsImg']['tmp_name'];   
        if(!empty($file))
        {  
            if(move_uploaded_file($file_name,"../uploads/$file"))
            {
                $query="Update courses set Name='$CrsName', Description='$CrsDes', ImageUrl='../uploads/$file', StartDate='$StartDate', EndDate='$EndDate', Price='$Price', Posted=NOW() Where Id='$CrsId'";
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
            $query="Update courses set Name='$CrsName', Description='$CrsDes', StartDate='$StartDate', EndDate='$EndDate', Price='$Price', Posted=NOW() Where Id='$CrsId'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
    }

?>