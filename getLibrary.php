<?php include ('header.php')?>
<?php    
    if(isset($_GET['Id']) && !empty($_GET['Id']))
    {
        $Id=$_GET['Id'];
        $query="Select * from articles where IsDeleted=0 and Id=$Id";
        $art=mysqli_query($db,$query);
    }
    else
    {
        header('Location: index.php/#Library');
        die();
    }

?>
        <div class="container-fluid" style="padding-top: 75px;">   
            <div class="row">            
                <div class="col-xs-12 course">
                    <div class="col-md-12">
                    <h1 class="page-header" style="font-family: Raleway;">Article Details <div class="pull-right">
                            <a href="index.php" id="btnBack" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back To Library</a>
                        </div></h1>                    
                </div>
                     <?php
                        while($row=mysqli_fetch_assoc($art))
                        {   
                            echo '<div class="col-md-4">
                       <div class="crs-single-img">
                           <a class="viewimg" href="http://localhost/cms/'.$row['ImageUrl'].'"><img src="'.$row['ImageUrl'].'" class="img-responsive img-thumbnail"></a>
                       </div>
                    </div>
                    <div class="col-md-8">
                        <table class="crs-table">
                            <tr>
                                <td colspan="3"><h1>'.html_entity_decode($row['Title']).'</h1></td>
                            </tr>                           
                            <tr>
                                <td colspan="3">
                                    '.html_entity_decode($row['ArticleText']).'
                                </td>
                            </tr>
                        </table>
                    </div>';
                        }
                    ?>                   
                </div>
            </div>
        </div>
<?php include ('footer.php')?>