<?php include 'header.php';  ?>

<?php
    include("../db/connect.php");
    error_reporting(0);
    $msg="";
    $err="";
    $records=array();
    $file=$_FILES['MediaImg']['name'];
    $file_name=$_FILES['MediaImg']['tmp_name'];
     if($result=$db->query("Select * from media"))
    {
        if($result->num_rows)
        {
            while($row= $result->fetch_object())
            {
                $records[]=$row;
            }
            $result->free();
        }
    }
    if(isset($file))
    {
        if(!empty($file))
        {
            $location='../uploads/';
            if(move_uploaded_file($file_name,$location.$file))
            {
                if($insert=$db->query("Insert Into media(ImageUrl) Values('../uploads/{$file}')"))
                {
                    $msg= "Image Successfuly Uploaded";
                    header('location: ../admin/media.php');
                }            
            }
            else
            {
                $err= "Erro on Uploading the Image";
            }
        }
        else
        {
            $err= "Please Upload the Image";
        }    
    }
   

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Media</h1>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <ul class="media-list">  
                    <?php
                        if(count($records))
                        {
                            foreach($records as $r)
                            {
                    ?>
                     <li>  
                         <img src="<?= $r->ImageUrl ?>">                                        
                    </li>
                    <?php
                            }
                        }
                    ?>
                     <li>
                         <div id="addImg" class="add-img" data-toggle="modal" data-target="#add_media">
                             <i class="fa fa-4x fa-plus-circle" aria-hidden="true"></i>
                         </div>
                    </li>
                </ul>
               
            </div>
        </div>
    <?php
        if(!empty($msg))
        { 
            echo '<div class="alert text-center alert-success alert-dismissable">'.$msg.'</div>';   
        }
        if(!empty($err))
        {
            echo '<div class="alert text-center alert-danger alert-dismissable">'.$err.'</div>'; 
        }
    ?>
   
    
</div>
<!-- Modal - Add New Record/User -->
<form action="media.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="add_media" tabindex="-1" role="dialog" aria-labelledby="AddMedia">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Media</h4>
            </div>
            <div class="modal-body">
                
             <div class="form-group">
                 <div class="row">
                    <div class="col-md-6">
                        <img src="../img/noImg.png" name="prvImg" id="prvImg" height="200">
                     </div>
                     <div class="col-md-6">
                         <div class="fileUpload btn btn-default pull-right">
                                <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                <input type="file" class="upload" name="MediaImg" id="MediaImg" onchange="readURL(this);" />
                        </div>                        
                     </div>
                 </div>                            
            </div>        
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
    </div>
</form>


<script type="text/javascript">    
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
    </script>
<?php include 'footer.php'; ?>