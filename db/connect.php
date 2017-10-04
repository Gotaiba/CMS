<?php
    $db=new mysqli('localhost','ecpp_dblog','sahar!123','cms');
    if($db->connect_errno)
    {
        echo 'Sorry, there seems to be an error on the database connection';
    }
?>