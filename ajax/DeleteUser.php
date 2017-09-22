<?php 


if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../db/connect.php");
    $Usr_Id = $_POST['id'];
 
    $query = "Update users set IsDeleted=1 WHERE Id = '$Usr_Id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
    else
    {
        echo 1;
    }
}

?>