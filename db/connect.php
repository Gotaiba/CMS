<?php
    $db=new mysqli('localhost','root','','cms');
    if($db->connect_errno)
    {
        echo 'Sorry, there seems to be an error on the database connection';
    }
?>