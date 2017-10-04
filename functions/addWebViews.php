<?php
    function insertDateCount()
    {    
        include ('db/connect.php');   
        $nowDate=Date('Y-m-d');
        $query="Select * from visitors_count where Date='$nowDate'";    
        if($result=mysqli_query($db,$query))
        {
            if(mysqli_num_rows($result)<1)
            {
                $query="Insert Into visitors_count(Date,Views) Values(NOW(),0)";
                mysqli_query($db,$query);
            }
        }        
    }
    function getIPAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    function GetTodayWebViews()
    {
        include ('db/connect.php');
        $nowDate=Date("Y-m-d");
        //$views=0;
        $query="Select Views from visitors_count Where Date='$nowDate'";
        $result=mysqli_query($db,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $views=$row['Views'];
        }
        return $views;
    }
    function IncreaseWebViews()
    {    
        include ('db/connect.php');
        insertDateCount();
        $IP=getIPAddr();
        $nowDate=Date("Y-m-d");       
        $count=GetTodayWebViews();
        $sql="select * from visitors_ip where IPaddress='$IP'";
        $exe=mysqli_query($db,$sql);
        if(mysqli_num_rows($exe)>0)
        {
            $sql="Select * from visitors_ip where IPaddress='$IP' and Date='$nowDate'";
            $exe=mysqli_query($db,$sql);
            if(mysqli_num_rows($exe)<1)
            {
                $sql="Update visitors_ip Set Date=NOW() Where IPaddress='$IP'";
                mysqli_query($db,$sql);
                $count ++;
                $sql="Update visitors_count Set Views=$count Where Date='$nowDate'";
                mysqli_query($db,$sql);                            
            }
        }
        else
        {
            $sql="Insert Into visitors_ip(IPaddress,Date) Values('$IP',NOW())";
            mysqli_query($db,$sql);
            $count ++;           
            $sql="Update visitors_count Set Views=$count where Date='$nowDate'";
            mysqli_query($db,$sql);
        }
    }
    

?>