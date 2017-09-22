<?php

    header('Access-Control-Allow-Origin: *');
   if(isset($_POST["LibTitle"]) && isset($_POST["LibSubtitle"]) && isset($_POST['LibContent']))
    {
        include("../db/connect.php");
       $Title=$_POST['LibTitle'];
        $Subtitle=$_POST['LibSubtitle'];
        $Content=$_POST['LibContent'];       
        $file=$_FILES['LibImg']['name'];
        $file_name=$_FILES['LibImg']['tmp_name'];   
        if(!empty($file))
        {  
            if(move_uploaded_file($file_name,"../uploads/$file"))
            {
                $query="Update pages set Title='$Title', Subtitle='$Subtitle', ImageUrl='../uploads/$file', Content='$Content', Created=NOW() Where Name='Library'";
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
            $query="Update pages set Title='$Title', Subtitle='$Subtitle', Content='$Content', Created=NOW() Where Name='Library'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
    }

?>