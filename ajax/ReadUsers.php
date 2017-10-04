<?php
    
    include('../db/connect.php');
    session_start();
    $userId=$_SESSION['Id'];
    $len="";
    $data='<table class="table table-bordered" id="allFaq">
            <tr>
                <th>First Name</th>          
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Date</th>
                <th>Action</th>
            </tr>';
    $query="Select * from users Where IsDeleted=0 Order By Id Desc";
    if(!$result=mysqli_query($db,$query))
    {
        exit(mysqli_error($db));
    }
    
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {   if($userId==$row['Id'])
            {
                $data .= '<tr>
                        <td>'.$row['FirstName'].' </td>                  
                        <td>'.$row['LastName'].'</td>
                        <td>'.$row['Email'].'</td>
                        <td>'.$row['Username'].'</td>
                        <td>'.$row['Created'].'</td>
                        <td style="text-align:center;width:230px;">
                            <button onClick="GetUserDetails('.$row['Id'].')" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>                            
                            <button type="button" onClick="RestPass('.$row['Id'].',this)" class="btn btn-sm btn-primary"><i class="fa fa-repeat" aria-hidden="true"></i> Reset</button>
                            <div class="reset">
                            <input type="password" id="resetPass'.$row['Id'].'" placeholder="New Password" class="form-control"/>
                            </div>
                            </td>
                        </tr>';
            }
            else
            {
            $data .= '<tr>
                        <td>'.$row['FirstName'].' </td>                  
                        <td>'.$row['LastName'].'</td>
                        <td>'.$row['Email'].'</td>
                        <td>'.$row['Username'].'</td>
                        <td>'.$row['Created'].'</td>
                        <td style="text-align:center;width:230px;">
                            <button onClick="GetUserDetails('.$row['Id'].')" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                            <button onClick="DeleteUser('.$row['Id'].')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            <button type="button" onClick="RestPass('.$row['Id'].',this)" class="btn btn-sm btn-primary"><i class="fa fa-repeat" aria-hidden="true"></i> Reset</button>
                            <div class="reset">
                            <input type="password" id="resetPass'.$row['Id'].'" placeholder="New Password" class="form-control"/>
                            </div>
                            </td>
                        </tr>';
            }
        }    
    }
    else
    {
         $data .='<tr><td colspan="6" class="no-rows"> No Users Available </td></tr>';
    }
    $data .='</table>';
    echo $data;