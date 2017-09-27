<?php

    function getUserInfo($Id)
    {
        include ('../db/connect.php');
        $query="Select * from users where Id=$Id";
        if($result=mysqli_query($db,$query))
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $user[]=$row['FirstName'];
                $user[]=$row['LastName'];
                $user[]=$row['Email'];
                $user[]=$row['Username'];
            }
        }
        return $user;
    }

?>