<?php include ('header.php')?>
<?php     
    if(isset($_GET['Id']) && !empty($_GET['Id']))
    {
        $Id=$_GET['Id'];
        $query="Select * from faq where IsDeleted=0 and Id=$Id";
        $faq=mysqli_query($db,$query);
    }
    else
    {
        header('Location: index.php/#Faq');
        die();
    }

?>
        <div class="container-fluid" style="padding-top: 75px;">   
            <div class="row events"> 
                <div class="col-md-12">
                   <h1 class="page-header" style="font-family: Raleway;">Frequently Ask Question <div class="pull-right">
                            <a href="index.php" id="btnBack" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back To FAQ</a>
                        </div></h1>  
                </div>
                <?php
                
                    while($row=mysqli_fetch_assoc($faq))
                    {
                        echo'<div class="col-md-11 col-md-offset-1 faq-single">
                    <h3>'.html_entity_decode($row['Question']).' ?</h3>
                </div>
                <div class="col-md-9 col-xs-10 col-centered faq-single-para">
                    '.html_entity_decode($row['Answer']).'
                </div>';
                    }
                
                ?>                        
            </div>
        </div>
<?php include ('footer.php')?>