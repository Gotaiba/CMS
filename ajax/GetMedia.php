<?php
    include("../db/connect.php");
    $rowid = $_POST['rowid'];
    $rowperpage = $_POST['rowperpage'];
    $html="";
    $sql_show="Select * from media Limit ".$rowid.",".$rowperpage;
    
    $data_show=mysqli_query($db,$sql_show);
    if(mysqli_num_rows($data_show)>0)
    {
        While($row=mysqli_fetch_assoc($data_show))
        {
            $html.='<li><a href="#" onClick="getImgid(this)"><img src="'.$row['ImageUrl'].'" />
            <span style="display:none;">'.$row['Id'].'</span>
            </a></li>';
        }
    }
    echo $html;
?>