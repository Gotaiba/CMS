<?php
    
    include('../db/connect.php');
    
    $data='<table class="table table-bordered">
            <tr>
                <th>Name</th>          
                <th>Picture</th>
                <th>Price</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Username</th>
                <th>Posted</th>
                <th>Action</th>
            </tr>';
    $query="Select * from courses Where IsDeleted=0 Order By Id Desc";
    if(!$result=mysqli_query($db,$query))
    {
        exit(mysqli_error($db));
    }
    
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $data .= '<tr>
                        <td>'.$row['Name'].'</td>                  
                        <td>
                        <div class="thumbnailcus table-img">
                        <img src="../'.$row['ImageUrl'].'"/>
                        </div>
                        </td>
                        <td>'.number_format($row['Price']).'$</td>
                        <td>'.$row['StartDate'].'</td>
                        <td>'.$row['EndDate'].'</td>
                        <td>'.$row['Username'].'</td>
                        <td>'.$row['Posted'].'</td>
                        <td>
                            <button onClick="GetCourseDetails('.$row['Id'].')" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                            <button onClick="DeleteCourse('.$row['Id'].')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></td>
                        </tr>';
        }    
    }
    else
    {
         $data .='<tr><td colspan="7" class="no-rows"> No Course Available </td></tr>';
    }
    $data .='</table>';
    echo $data;