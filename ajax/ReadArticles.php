<?php
    
    include('../db/connect.php');
    
    $data='<table class="table table-bordered">
            <tr>
                <th>Title</th>          
                <th>Picture</th>
                <th>Username</th>
                <th>Posted</th>
                <th>Action</th>
            </tr>';
    $query="Select * from articles Where IsDeleted=0 Order By Id Desc";
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
                        <td>
                        <div class="thumbnailcus table-img">
                        <img src="'.$row['ImageUrl'].'"/>
                        </div>
                        </td>
                        <td>'.$row['Username'].'</td>
                        <td>'.$row['Posted'].'</td>
                        <td>
                            <button onClick="GetArticleDetails('.$row['Id'].')" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                            <button onClick="DeleteArticle('.$row['Id'].')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></td>
                        </tr>';
        }    
    }
    else
    {
         $data .='<tr><td colspan="5" class="no-rows"> No Article Available </td></tr>';
    }
    $data .='</table>';
        
    echo $data;
?>