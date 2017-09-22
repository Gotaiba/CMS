<?php 


if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../db/connect.php");
    // get event id
    $Evt_id = $_POST['id'];
 
    // delete Event
    $query = "Update events set IsDeleted=1 WHERE Id = '$Evt_id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
    else
    {
        echo 1;
    }
}

?>