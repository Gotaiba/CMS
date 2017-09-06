<?php
    
    include('../db/connect.php');
    
    $data='<table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Summary</th>
                <th>Picture</th>
                <th>Posted</th>
                <th>Action</th>
            </tr>';
    $query="Select * from articles";
    if(!$result=mysqli_query($db,$query))
    {
        exit(mysqli_error($db));
    }
    
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $data .= '<tr>
                        <td>'.$row['Title'].'</td>
                        <td>'.$row['SmallDescription'].'</td>
                        <td><img src="'.$row['ImageUrl'].'" width="100" height="100"/></td>
                        <td>'.$row['Posted'].'</td>
                        <td>
                            <button onClick="GetArticelDetails('.$row['Id'].')" class="btn btn-warning">Edit</button>
                            <button onClick="DeleteArticle('.$row['Id'].')" class="btn btn-danger">Delete</button></td>
                        </tr>';
        }    
    }
    else
    {
         $data .='<tr><td colspan="5"> No Article Available </td></tr>';
    }
    $data .='</table>';
        
    echo $data;
?>