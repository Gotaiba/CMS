<?php include ('header.php')?>
<?php    
    $nowDate=Date('Y-m-d');
    $query="Select * from courses where IsDeleted=0 order by StartDate Desc";
    $crs=mysqli_query($db,$query);

?>
        <div class="container-fluid" style="padding-top: 75px;">   
            <div class="row">            
                <div class="col-xs-12 courses">
                    <div class="col-md-12 text-center">
                    <h2 class="page-header">All Courses</h2>
                </div>
                    <?php
                        while($row=mysqli_fetch_assoc($crs))
                        {    
                             $len=$row['Description'];
                            if(strlen($len)>180)
                            {
                                $len=substr($len,0,180);
                                $len.=" ...";
                            }
                            $price=strval($row['Price']);
                            if($price=="0")
                                $price="Contact Us For Enrollment"; 
                            else
                                $price=number_format($price).' <i class="fa fa-dollar"></i>';
                        echo '<div class="col-md-3 col-sm-3 no-padding crs"><div class="crs-thum" style="background-image: url('.$row['ImageUrl'].');"><a class="viewimg" href="http://localhost/cms/'.$row['ImageUrl'].'"></a></div>
                                    <span>'.$price.'</span>
                                    <div class="crs-content">
                                        <h2>'.html_entity_decode($row['Name']).'</h2>
                                        <span><i>'.$row['StartDate'].' <i class="fa fa-long-arrow-right"></i> '.$row['EndDate'].'</i></span>
                                        '.html_entity_decode($len).'
                                        <a href="getCourse.php?Id='.$row['Id'].'">Read More</a>
                                        </div>
                                    </div>';
                        }
                    ?>                                               
                </div>
            </div>
        </div>
<?php include ('footer.php')?>