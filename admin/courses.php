<?php include 'header.php';  ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Courses</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-primary" data-toggle="modal" id="btnAdd" data-target="#add_new_record_modal"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>All Courses:</h3>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>

<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="AddingArticle">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addingCourse">Add New Course</h4>
            </div>
            <form action="" id="superform" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" id="CourseId" name="CourseId"/>
                <div class="form-group">
                    <label for="CrsName">Course Name</label>
                    <input type="text" id="CrsName" name="CrsName"  placeholder="Course Name ..." class="form-control"/>
                </div>               
             <div class="form-group">
                 <label>Select Course Image</label>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnailcus">
                            <img src="../img/noImg.png" name="prvImg" id="prvImg">
                        </div>
                        
                     </div>
                     <div class="col-md-6">
                         <div class="fileUpload btn btn-default">
                                <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                <input type="file" class="upload" name="CrsImg" id="CrsImg" onchange="readURL(this);" />
                         </div>
                         <div class="col-md-12">
                            &nbsp;<span class="text-danger" id="errupload"></span>
                         </div>
                         
                     </div>
                 </div>   
            </div> 
                 <div class="form-group">
                     <div class="row">
                         <label class="control-label col-md-3">Price</label>
                         <div class="col-md-6">
                             <label class="sr-only" for="CrsPrice">Price</label>
                            <div class="input-group">                  
                                <input type="text" class="form-control" id="CrsPrice" name="CrsPrice" pattern="[0-9]*" placeholder="Price">
                            
                                <div class="input-group-addon">$</div>                            
                            </div>
                             &nbsp;<span class="text-danger" id="errmsg"></span>
                         </div>
                          <div class="col-md-3">
                            <div class="checkbox checkbox-primary">
                                <input id="chkbox-unsp" type="checkbox">
                                <label for="chkbox-unsp">Unspecified</label>
                            </div>
                         </div>
                     </div>                                     
                </div>
            <div class="form-group">
                <div class="row">
                    <label for="StartDate" class="col-md-3 control-label">Start Date</label>
                   <div class="col-md-6">
                       <div class="input-group date" data-provide="datepicker">
                           <input type="text" placeholder="Start Date..." name="StartDate" id="StartDate" class="form-control">
                           <div class="input-group-addon">
                               <i class="fa fa-th" aria-hidden="true"></i>
                           </div>
                        </div>
                        &nbsp;<span class="text-danger" id="errstartDate"></span>
                    </div> 
                </div>
            </div>
            <div class="form-group">
                 <div class="row">
                    <label for="EndDate" class="col-md-3 control-label">End Date</label>
                    <div class="col-md-6">
                       <div class="input-group date" data-provide="datepicker">
                           <input type="text" placeholder="End Date..." id="EndDate" name="EndDate" class="form-control">
                           <div class="input-group-addon">
                               <i class="fa fa-th" aria-hidden="true"></i>
                           </div>
                        </div>
                        &nbsp;<span class="text-danger" id="errendDate"></span>
                    </div> 
                </div>                
            </div>
            
            <div class="form-group">
                <label for="CrsDes">Description Text</label>
                &nbsp;<span class="text-danger" id="errContent"></span>
                <textarea class="editor" id="CrsDes" name="CrsDes"></textarea>                   
            </div>        
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnUpdate" onClick="UpdateCourse()">Update</button>
                <button type="button" class="btn btn-primary" id="btnSubmit" onClick="addcourse()">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- // Modal -->


<?php include 'footer.php';  ?>
<script type="text/javascript" src="../scripts/course.js"></script>
<script type="text/javascript">
     $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
})
$("#chkbox-unsp").change(function(){
    if(this.checked) 
        {
        $("#CrsPrice").val('0');
        $("#CrsPrice").attr('readOnly', true);
        }
    else
        {
            $("#CrsPrice").val('');
            $("#CrsPrice").removeAttr("readOnly");         
        }
        
});
    $("#CrsPrice").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything    
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
         var price=$("#CrsPrice").val();
        if(price=='' && e.which==48)
            {
                $("#errmsg").html("Not allowed").show().fadeOut("slow");
               return false;
            }
   });

</script>


