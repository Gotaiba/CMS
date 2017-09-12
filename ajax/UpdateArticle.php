<?php

    header('Access-Control-Allow-Origin: *');
    if(isset($_POST['Update_ArtTitle']) && isset($_POST['Update_ArtText']) && isset($_POST['ArticleId']))
    {
        include("../db/connect.php");
        $ArtText=$_POST['Update_ArtText'];
        $ArtTitle=$_POST['Update_ArtTitle'];    
        $ArtId=$_POST['ArticleId'];
        $file=$_FILES['Update_ArtImg']['name'];
        $file_name=$_FILES['Update_ArtImg']['tmp_name'];
        if(!empty($file))
        {  
            if(move_uploaded_file($file_name,"../uploads/$file"))
            {
                $query="Update articles set Title='$ArtTitle', ArticleText='$ArtText', ImageUrl='../uploads/$file', Posted=NOW() Where Id='$ArtId'";
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
            $query="Update articles set Title='$ArtTitle', ArticleText='$ArtText', Posted=NOW() Where Id='$ArtId'";
            if(!$result=mysqli_query($db,$query))        
                exit(mysqli_error($db));   
            else
                echo 1;                        
        }
    }

?>