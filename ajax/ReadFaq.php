<?php
    
    include('../db/connect.php');
    $len="";
    $data='<table class="table table-bordered" id="allFaq">
            <tr>
                <th>Question</th>          
                <th>Answer</th>
                <th>Username</th>
                <th>Posted</th>
                <th>Action</th>
            </tr>';
    $query="Select * from faq Where IsDeleted=0 Order By Id Desc";
    if(!$result=mysqli_query($db,$query))
    {
        exit(mysqli_error($db));
    }
    
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $len=html_entity_decode($row['Answer']);
            if(strlen($len)>60)
            {
                $len=substr($len,0,60);
                $len.=" ...";
            }
            $data .= '<tr>
                        <td>'.$row['Question'].' ?</td>                  
                        <td>'.$len.'</td>
                        <td>'.$row['Username'].'</td>
                        <td>'.$row['Posted'].'</td>
                        <td>
                            <button onClick="GetFaqDetails('.$row['Id'].')" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                            <button onClick="DeleteFaq('.$row['Id'].')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></td>
                        </tr>';
        }    
    }
    else
    {
         $data .='<tr><td colspan="4" class="no-rows"> No FAQ Available </td></tr>';
    }
    $data .='</table>';
    echo $data;