<?php 


if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../db/connect.php");
    // get user id
    $crs_id = $_POST['id'];
 
    // delete User
    $query = "Update courses set IsDeleted=1 WHERE Id = '$crs_id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
    else
    {
        echo 1;
    }
}

?>