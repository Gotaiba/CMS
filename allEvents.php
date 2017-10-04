<?php include ('header.php')?>
<?php    
    $nowDate=Date('Y-m-d');
    $query="Select * from events where IsDeleted=0 order by StartDate Desc";
    $evt=mysqli_query($db,$query);

?>
        <div class="container-fluid" style="padding-top: 75px;">   
            <div class="row events"> 
                <div class="col-md-12">
                    <h2 class="page-header text-center">
                        All Events
                    </h2>
                </div>
                <div class="col-xs-12 event-group">
                <?php
                    $i=0;                   
                    while($row=mysqli_fetch_assoc($evt))
                    {
                        /*if($i==0)
                        {
                           echo'<div class="col-xs-12 event-group">';                             
                        }*/                           
                        echo '  <div class="col-md-6"><div class="col-md-6">
                                    <div class="event-img">
                                        <img src="'.$row['ImageUrl'].'" class="img-responsive img-thumbnail" alt="Event Image"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="event-content">
                                        <h3>'.html_entity_decode($row['Name']).'</h3>
                                        <label>Event Date:&nbsp;</label><span><i>'.$row['StartDate'].' <i class="fa fa-long-arrow-right"></i> '.$row['EndDate'].'</i></span>
                                        '.html_entity_decode($row['Description']).'
                                    </div>
                                </div></div>';
                        $i++;
                        /*if($i==2)
                        {
                            echo'</div>';
                            $i=0;
                        }*/
                    }
                
                ?>  
                </div>
            </div>
        </div>
<?php include ('footer.php')?>