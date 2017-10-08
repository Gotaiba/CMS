<?php include ('header.php')?>
<?php    
    $nowDate=Date('Y-m-d');   
    $query="Select * from articles where IsDeleted=0";
    $art=mysqli_query($db,$query);

?>
        <div class="container-fluid" style="padding-top: 75px;">   
            <div class="row">            
                 <div class="col-lg-12 text-center">
                     <div class="col-md-12">
                    <h2 class="page-header">All Library</h2>
                </div>
                    <?php
                        while($row=mysqli_fetch_assoc($art))
                        {
                            $len=$row['ArticleText'];
                            if(strlen($len)>350)
                            {
                                $len=substr($len,0,350);
                                $len.=" ...";
                            }
                            echo ' <div class="col-md-10 col-md-offset-1 lib-main">
                        <div class="col-md-3">
                        <div class="lib-img">
                           <a href="http://ecpp-ph.com/temp/'.$row['ImageUrl'].'"> <img src="'.$row['ImageUrl'].'" /></a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="lib-content">
                            <h2>'.html_entity_decode($row['Title']).'</h2>
                            '.html_entity_decode($len).'
                            <a href="getLibrary.php?Id='.$row['Id'].'">Read More</a>
                        </div>
                    </div>
                    </div>';
                        }
                    ?>                                             
                </div>
            </div>
        </div>
<?php include ('footer.php')?>