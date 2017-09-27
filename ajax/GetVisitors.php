<?php
    include('../db/connect.php');
    $query="Select * from visitors_count order by Date Limit 30";
    if(!$result=mysqli_query($db,$query))
    {
        exit(mysqli_error($db));
    }
    $respons=array();
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $respons[]=$row;
        }
    }
    else
    {
        $respons['status'] = 200;
        $respons['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($respons);
    
?>