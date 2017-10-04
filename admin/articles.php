<?php include 'header.php';  ?>

<?php
    include("../db/connect.php");
    $sql="Select * from media";
    $data=mysqli_query($db,$sql);
    $count=mysqli_num_rows($data);
?>

    

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Articles</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_new_record_modal"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
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
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="Adding Article">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="AddingArticle">Add New Article</h4>
            </div>
            <form action="" id="superform" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="ArtTitle">Article Title</label>
                    <input type="text" id="ArtTitle" name="ArtTitle" placeholder="Article Title" class="form-control"/>
                </div>               
             <div class="form-group">
                 <label>Select Article Image</label>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnailcus">
                            <img src="../img/noImg.png" name="prvImg" id="prvImg">
                        </div>
                        
                     </div>
                     <div class="col-md-6">
                         <div class="fileUpload btn btn-default">
                                <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                <input type="file" class="upload" name="ArtImg" id="ArtImg" onchange="readURL(this);" />
                        </div>
                         <div class="col-md-12">
                            &nbsp;<span class="text-danger" id="errupload"></span>
                         </div>
                     </div>
                      
                 </div>   
                <!--<div id="meida">
                    <ul id="media-list">
                        
                    </ul>
                </div>
                 <div id="paging" class="text-center">
                    <input type="hidden" id="txt_rowid" value="0">
                    <input type="hidden" id="txt_allcount" value="">     
                     <input type="hidden" id="ImgId" value="0">
                     <button  class="btn btn-default" id="but_prev" ><i class="fa fa-2x fa-arrow-circle-left" aria-hidden="true"></i></button>
                     <button  class="btn btn-default" id="but_next" ><i class="fa fa-2x fa-arrow-circle-right" aria-hidden="true"></i></button>
            
                 </div>-->
            </div>  
            
            <div class="form-group">
                 
                <label for="Arttxt">Articel Text</label>
                &nbsp;<span class="text-danger" id="errContent"></span>
                <textarea class="editor" id="ArtText" name="ArtText"></textarea>                   
            </div>        
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onClick="addarticle()">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- // Modal -->
<!-- Modal - Update Article details -->
<div class="modal fade" id="update_article_modal" tabindex="-1" role="dialog" aria-labelledby="UpdateArticle">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="UpdateArticle">Update Article</h4>
            </div>
             <form action="" id="superformUpdate" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">                           
                <div class="form-group">
                    <label for="Update_ArtTitle">Article Title</label>
                    <input type="text" id="Update_ArtTitle" name="Update_ArtTitle" placeholder="Article Title" class="form-control"/>
                </div>               
             <div class="form-group">
                 <label>Select Article Image</label>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnailcus">
                            <img src="../img/noImg.png" name="Update_prvImg" id="Update_prvImg">
                        </div>                    
                     </div>
                     <div class="col-md-6">
                         <div class="fileUpload btn btn-default">
                                <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                <input type="file" class="upload" name="Update_ArtImg" id="Update_ArtImg" onchange="readURL_Update(this);" />
                        </div>   
                          <div class="col-md-12">
                            &nbsp;<span class="text-danger" id="errupload2"></span>
                         </div>
                     </div>
                 </div>   
            </div>  
            
            <div class="form-group">
                <label for="Update_ArtText">Articel Text</label>
                &nbsp;<span class="text-danger" id="errContentup"></span>
                <textarea class="editor" id="Update_ArtText" name="Update_ArtText"></textarea>  
                <input type="hidden" id="ArticleId" name="ArticleId"/>
            </div>        
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onClick="UpdateArticle()">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal -->



<?php include 'footer.php'  ?>
<script type="text/javascript" src="../scripts/article.js"></script>
<script type="text/javascript">
 
        /* var rowperpage = 5;
        $(document).ready(function(){
        getMedia();
        $("#but_prev").click(function(){
            var rowid = Number($("#txt_rowid").val());
            var allcount = Number($("#txt_allcount").val());
            rowid -= rowperpage;
            if(rowid < 0){
                rowid = 0;
            }
            $("#txt_rowid").val(rowid);
            getMedia();
        });

        $("#but_next").click(function(){
            var rowid = Number($("#txt_rowid").val());
            var allcount = Number($("#txt_allcount").val());;
            rowid += rowperpage;            
            if(rowid < allcount){
                $("#txt_rowid").val(rowid);
                getMedia();
            }

        });
    });*/
    </script>