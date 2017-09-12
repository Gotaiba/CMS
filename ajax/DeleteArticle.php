<?php 


if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../db/connect.php");
    // get user id
    $art_id = $_POST['id'];
 
    // delete User
    $query = "Update articles set IsDeleted=1 WHERE Id = '$art_id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
    else
    {
        echo 1;
    }
}

?>