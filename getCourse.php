<?php include ('header.php')?>
<?php        
    if(isset($_GET['Id']) && !empty($_GET['Id']))
    {
        $Id=$_GET['Id'];
        $query="Select * from courses where IsDeleted=0 and Id=$Id order by StartDate Desc";
        $crs=mysqli_query($db,$query);
    }
    else
    {
        header('Location: index.php/#Courses');
        die();
    }

?>
        <div class="container-fluid" style="padding-top: 75px;">   
            <div class="row">            
                <div class="col-xs-12 course">
                    <div class="col-md-12">
                    <h1 class="page-header" style="font-family: Raleway;">Course Details <div class="pull-right">
                            <a href="index.php" id="btnBack" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back To Courses</a>
                        </div></h1>                    
                </div>
                     <?php
                        while($row=mysqli_fetch_assoc($crs))
                        {   
                            $ts1 = strtotime($row['StartDate']);
                            $ts2 = strtotime($row['EndDate']);

                            $year1 = date('Y', $ts1);
                            $year2 = date('Y', $ts2);                            

                            $month1 = date('m', $ts1);
                            $month2 = date('m', $ts2);

                            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                            if($diff=="0")
                            {
                                $datediff=$ts2-$ts1;
                                $diff=floor($datediff / (60 * 60 * 24));
                                $diff.=" Days";
                            }
                            else
                                $diff.=" Months";                            
                            $price=strval($row['Price']);
                            if($price=="0")
                                $price="Contact Us For Enrollment"; 
                            else
                                $price=number_format($price).' <i class="fa fa-dollar"></i>';
                            echo '<div class="col-md-4">
                       <div class="crs-single-img">
                           <a class="viewimg" href="http://localhost/cms/'.$row['ImageUrl'].'"><img src="'.$row['ImageUrl'].'" class="img-responsive img-thumbnail"></a>
                       </div>
                    </div>
                    <div class="col-md-8">
                        <table class="crs-table">
                            <tr>
                                <td colspan="3"><h1>'.html_entity_decode($row['Name']).'</h1></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label>Course Duration: </label><span>'.$diff.'</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label>Course Dates:</label><span>'.$row['StartDate'].' <i class="fa fa-long-arrow-right" aria-hidden="true"></i> '.$row['EndDate'].'</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label>Course Price:</label><span>'.$price.'</span></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    '.html_entity_decode($row['Description']).'
                                </td>
                            </tr>
                        </table>
                    </div>';
                        }
                    ?>
                   <!--<div class="col-md-4">
                       <div class="crs-single-img">
                           <a class="viewimg" href="http://localhost/cms/uploads/bg.jpg"><img src="uploads/bg.jpg" class="img-responsive img-thumbnail"></a>
                       </div>
                    </div>
                    <div class="col-md-8">
                        <table class="crs-table">
                            <tr>
                                <td colspan="3"><h1>The Course Title Goes Here</h1></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label>Course Duration: </label><span>1 Year</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label>Course Dates:</label><span>2017-10-10 <i class="fa fa-long-arrow-right" aria-hidden="true"></i> 2018-10-10</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><label>Course Price:</label><span>889 <i class="fa fa-dollar" aria-hidden="true"></i></span></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>-->
                </div>
            </div>
        </div>
<?php include ('footer.php')?>