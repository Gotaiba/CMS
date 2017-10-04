<?php 
    session_start();
    $expire=$_SESSION['timeout']+1800;
    if(!isset($_SESSION['Id']) || empty($_SESSION['Id']))
    {
        header('Location: index.php');
        die();
    }
    else 
    {
        if($expire<time())
        {
            session_destroy();
            header('Location: index.php');
            die();
        }
        else
        {
            include '../functions/getUserInfo.php';
            $user=getUserInfo($_SESSION['Id']);   
           
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
     <link rel="stylesheet" href="../css/editor.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<div id="wrapper">
        
    

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-left:0;">
                <li class="sidebar-brand">
                    <img src="../img/big-logo.png" height="100" />
                        <a href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;float:right;" > <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> 
                    
                </li>
                <li>
                    <a href="../admin/dashboard.php">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span style="margin-left:10px;">Dashboard</span>  
                    </a>
                </li>
                <li>
                    <a href="../admin/articles.php">
                        <i class="fa fa-book" aria-hidden="true"></i> 
                        <span style="margin-left:10px;"> Articles</span> 
                    </a>
                </li>
                 <li>
                    <a href="../admin/courses.php">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <span style="margin-left:10px;"> Courses</span> 
                     </a>
                </li>
                <li>
                    <a href="../admin/events.php">
                       <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span style="margin-left:10px;"> Events</span> 
                     </a>
                </li>
                <li>
                    <a href="../admin/pages.php">
                       <i class="fa fa-file-o" aria-hidden="true"></i>
                        <span style="margin-left:10px;"> Pages</span> 
                    </a>                    
                </li>
                <li>
                    <a href="../admin/faq.php">
                     <i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span style="margin-left:10px;">FAQ </span> 
                    </a>
                </li>  
                <li>
                    <a href="../admin/users.php">
                       <i class="fa fa-users" aria-hidden="true"></i>
                        <span style="margin-left:10px;"> Users</span> 
                    </a>
                </li>
                <li>
                    <a href="../admin/logout.php">
                       <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span style="margin-left:10px;"> Logout</span> 
                    </a>
                </li>
                              
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="user-info"><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp; Welcome <?php echo '<strong>'. $user[0].' '.$user[1].'</strong>';?></div>                     

