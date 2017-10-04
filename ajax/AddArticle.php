<?php
    session_start();
    header('Access-Control-Allow-Origin: *');
    if(isset($_POST['ArtTitle']) && isset($_POST['ArtText']))
    {
        include("../db/connect.php");
        include("../functions/getUserInfo.php");
         include("../functions/security.php");
        $user=getUserInfo($_SESSION['Id']);
        $ArtText=escape($_POST['ArtText']);
        $ArtTitle=escape($_POST['ArtTitle']);          
        $file=$_FILES['ArtImg']['name'];
        $file_name=$_FILES['ArtImg']['tmp_name'];
        if(!empty($file))
        {
            $location='../uploads/';
            if(move_uploaded_file($file_name,$location.$file))
            {
                $query="Insert Into articles(Title,ArticleText,ImageUrl,Username,Posted)
                Values('$ArtTitle','$ArtText','uploads/$file','$user[3]',NOW())";
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
                $query="Insert Into articles(Title,ArticleText,ImageUrl,Username,Posted)
                Values('$ArtTitle','$ArtText','uploads/noImg.png','$user[3]',NOW())";
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