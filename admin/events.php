<?php include 'header.php';  ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Events</h1>
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
            <h3>All Events:</h3>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>

<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="AddingEvent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addingEvent">Add New Event</h4>
            </div>
            <form action="" id="superform" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" id="EventId" name="EventId"/>
                <div class="form-group">
                    <label for="EvtName">Event Name</label>
                    <input type="text" id="EvtName" name="EvtName"  placeholder="Event Name ..." class="form-control"/>
                </div>               
             <div class="form-group">
                 <label>Select Event Image</label>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnailcus">
                            <img src="../img/noImg.png" name="prvImg" id="prvImg">
                        </div>
                        
                     </div>
                     <div class="col-md-6">
                         <div class="fileUpload btn btn-default">
                                <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                <input type="file" class="upload" name="EvtImg" id="EvtImg" onchange="readURL(this);" />
                         </div>
                         <div class="col-md-12">
                            &nbsp;<span class="text-danger" id="errupload"></span>
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
                <label for="EvtDes">Description</label>
                <textarea class="editor" id="EvtDes" name="EvtDes"></textarea>                   
            </div>        
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnUpdate" onClick="UpdateEvent()">Update</button>
                <button type="button" class="btn btn-primary" id="btnSubmit" onClick="addevent()">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- // Modal -->


<?php include 'footer.php';  ?>
<script type="text/javascript" src="../scripts/event.js"></script>
<script type="text/javascript">
     $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});

</script>


