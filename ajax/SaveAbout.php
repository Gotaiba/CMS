<?php

    header('Access-Control-Allow-Origin: *');
   if(isset($_POST["AbtTitle"]) && isset($_POST["AbtSubtitle"]) && isset($_POST['AbtContent']))
    {
        include("../db/connect.php");
       include("../functions/security.php");
       $Title=escape($_POST['AbtTitle']);
        $Subtitle=escape($_POST['AbtSubtitle']);
        $Content=escape($_POST['AbtContent']);       
        $file=$_FILES['AbtImg']['name'];
        $file_name=$_FILES['AbtImg']['tmp_name'];   
        if(!empty($file))
        {  
            if(move_uploaded_file($file_name,"../uploads/$file"))
            {
                $query="Update pages set Title='$Title', Subtitle='$Subtitle', ImageUrl='uploads/$file', Content='$Content', Created=NOW() Where Name='About'";
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
            $query="Update pages set Title='$Title', Subtitle='$Subtitle', Content='$Content', Created=NOW() Where Name='About'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
    }

?>