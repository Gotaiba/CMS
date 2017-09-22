<?php
    header('Access-Control-Allow-Origin: *');
    if(isset($_POST['ArtTitle']) && isset($_POST['ArtText']))
    {
        include("../db/connect.php");
        $ArtText=$_POST['ArtText'];
        $ArtTitle=$_POST['ArtTitle'];          
        $file=$_FILES['ArtImg']['name'];
        $file_name=$_FILES['ArtImg']['tmp_name'];
        if(!empty($file))
        {
            $location='../uploads/';
            if(move_uploaded_file($file_name,$location.$file))
            {
                $query="Insert Into articles(Title,ArticleText,ImageUrl,Posted)
                Values('$ArtTitle','$ArtText','../uploads/$file',NOW())";
                if(!$result = mysqli_query($db,$query))
                {
                    exit(mysqli_error($db));
                }
            }
            echo 1;
        }
        else
        {
            if(!empty($ArtText) &&!empty($ArtTitle))
            {
                $query="Insert Into articles(Title,ArticleText,ImageUrl,Posted)
                Values('$ArtTitle','$ArtText','../uploads/noImg.png',NOW())";
                if(!$result = mysqli_query($db,$query))
                {
                    exit(mysqli_error($db));
                }
                else{
                    echo 1;
                }
            }
            else{
                echo 0;
            }
        }
    }
    else
    {
        echo 0;
    }
    
?>