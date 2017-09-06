<?php include 'header.php';  ?>

<?php /*
//error_reporting(0);
    $msg="";
    $err="";
    $file=$_FILES['ArtImg']['name'];
    $file_name=$_FILES['ArtImg']['tmp_name'];
    $ArtTitle=$_POST['ArtTitle'];
    $ArtSum=$_POST['Smalltxt'];
    $ArtText=$_POST['Arttxt'];
    if(isset($file))
    {
        if(!empty($file))
        {
            $location='../uploads';
            if(move_uploaded_file($file_name,$location.$file))
            {
                $msg="Image Successfuly Uploaded";
            }
            else
            {
                $err="Erro on Uploading the Image";
            }
        }
        else
        {
            $err="Please Upload the Image";
        }
         if(isset($ArtTitle) && isset($ArtSum) && isset($ArtText))
         {
             if(!empty($ArtTitle) && !empty($ArtSum) && !empty($ArtText))
             {
                 
             }
         }
    }
    */
?>

    

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Articles</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Article</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Articles:</h3>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Article</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="ArtTitle">Article Title</label>
                    <input type="text" id="ArtTitle" placeholder="Article Title" class="form-control"/>
                </div>
 
                <div class="form-group">
                <label for="ArtSum">Articel Summary</label>
                <textarea name="ArtSum" id="ArtSum"> </textarea>
                </div>
             <div class="form-group">
                <img src="../img/noImg.png" name="prvImg" id="prvImg" height="200">
                <input type="file" name="ArtImg" id="ArtImg" onchange="readURL(this);"/>
            </div>  
            
            <div class="form-group">
                <label for="Arttxt">Articel Text</label>
                <textarea id="txtEditor" name="Arttxt"></textarea>
                   <br/> <br/>   
            </div>        
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onClick="addarticle()">Save</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#prvImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<!-- // Modal -->
 

<!--<form action="articles.php" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table>
                </table>
                
            </div>
            <div class="form-group col-md-12">
                <label for="Title">Articel Title</label>
                <input type="text" class="form-control" name="ArtTitle" id="Title" placeholder="Tile">
            </div>        
            <div class="form-group col-md-6">
                <label for="Smalltxt">Articel Summary</label>
                <textarea rows="20" cols="40" class="form-control" name="Smalltxt" id="Smalltxt" placeholder="Article Summry Text"></textarea>
            </div>
             <div class="col-md-6 align-art-img">
                <img src="../img/noImg.png" name="prvImg" id="prvImg" height="350">
                <input type="file" name="ArtImg" id="ArtImg" onchange="readURL(this);"/>
            </div>  
            
            <div class="col-md-12 no-padding">
                <textarea id="txtEditor" name="Arttxt"></textarea>
                   <br/> <br/>   
            </div>        
                <div class="col-md-4 col-md-offset-4">
                    <input type="submit" class="btn btn-block btn-default"/>
                </div>
            </div>        
        </div>
</form>-->




<?php include 'footer.php'  ?>