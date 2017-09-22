<?php

    header('Access-Control-Allow-Origin: *');
    if(isset($_POST['id']) && isset($_POST['id']) != "" && isset($_POST['Pass']))
    {
    // include Database connection file
        include("../db/connect.php");
        $Usr_Id = $_POST['id'];
        $Password=md5($_POST['Pass']);

        $query = "Update users set Password='$Password' WHERE Id = '$Usr_Id'";
        if (!$result = mysqli_query($db, $query)) {
            exit(mysqli_error($db));
        }
        else
        {
            echo 1;
        }
    }


?>