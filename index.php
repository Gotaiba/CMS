<?php
    require '../CM/db/connect.php';
    require '../functions/security.php';

    if($result=$db->query("Select * from public"))
    {
        if($result->num_rows)
        {
            $rows=$result->fetch_object();   
        }
        $result->free();
    }
?>
<html>
    <body>
        <h1>
            <?php
                echo $rows->Headline;
            ?>
        </h1>
    
    </body>
</html>