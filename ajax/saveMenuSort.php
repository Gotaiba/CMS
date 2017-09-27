<?php

    include("../db/connect.php");
    $neworder=$_POST['ID'];
    $counter=1;
    foreach ($neworder as $item)
    {
        $query="Update navigation set OrderNo=$counter where Id=$item";
        if(!mysqli_query($db,$query))
            exit(mysqli_error($db));
        $counter ++; 
    }
     echo 1;   

?>