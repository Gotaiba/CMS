<?php
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    include('../db/connect.php');
    $Usr_Id=$_POST['id'];
    $query="Select * from users where Id='$Usr_Id'";
    if(!$result=mysqli_query($db,$query))
    {
        exit(mysqli_error($db));
    }
    $respons=array();
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $respons=$row;
        }
    }
    else
    {
        $respons['status'] = 200;
        $respons['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($respons);
}
else
{
    $respons['status'] = 200;
    $respons['message'] = "Invalid Request !";
}
    
?>