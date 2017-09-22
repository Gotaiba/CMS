<?php

    header('Access-Control-Allow-Origin: *');
   if(isset($_POST["CrsTitle"]) && isset($_POST["CrsSubtitle"]) && isset($_POST['CrsContent']))
    {
        include("../db/connect.php");
       $Title=$_POST['CrsTitle'];
        $Subtitle=$_POST['CrsSubtitle'];
        $Content=$_POST['CrsContent'];       
        $file=$_FILES['CrsImg']['name'];
        $file_name=$_FILES['CrsImg']['tmp_name'];   
        if(!empty($file))
        {  
            if(move_uploaded_file($file_name,"../uploads/$file"))
            {
                $query="Update pages set Title='$Title', Subtitle='$Subtitle', ImageUrl='../uploads/$file', Content='$Content', Created=NOW() Where Name='Course'";
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
            $query="Update pages set Title='$Title', Subtitle='$Subtitle', Content='$Content', Created=NOW() Where Name='Course'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
    }

?>