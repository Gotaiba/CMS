<?php
    
    if(isset($_POST['ArtTitle']) && isset($_POST['ArtSum']) && isset($_POST['ImgUrl']) && isset($_POST['ArtText']))
    {
        include("../db/connect.php");
        $ArtText=$_POST['ArtText'];
        $ArtTitle=$_POST['ArtTitle'];
        $ArtSum=$_POST['ArtSum'];
        $ImgUrl=$_POST['ImgUrl'];
        
        $query="Insert Into articles(Title,SmallDescription,LongDescription,ImageUrl,Posted)
            Values('$ArtTitle','$ArtSum','$ArtText','$ImgUrl','NOW()')";
        if(!$result = mysqli_query($db,$query))
        {
            exit(mysqli_error($db));
        }
        echo 'Artilce Inserted';
    }
    
?>