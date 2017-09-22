<?php include 'header.php';  ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Frequent Asks Question</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-primary" id="btnAdd" data-toggle="modal" data-target="#add_new_record_modal"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>All FAQ:</h3>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>

<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="AddingQuestion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addingQuestion">Add New Question</h4>
            </div>
            <form action="" id="superform" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" id="FaqId" name="FaqId"/>
                <div class="form-group">
                    <label for="QText">Question</label>
                    <input type="text" id="QText" name="QText"  placeholder="Question Text ..." class="form-control"/>
                </div>                                                       
            <div class="form-group">
                <label for="AnsText">Answer Text &nbsp;&nbsp;&nbsp;<span id="errAnsText" class="error"></span></label>
                <textarea class="editor" id="AnsText" name="AnsText"></textarea>                   
            </div>        
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnUpdate" onClick="UpdateFaq()">Update</button>
                <button type="button" class="btn btn-primary" id="btnSubmit" onClick="addquestion()">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- // Modal -->


<?php include 'footer.php';  ?>
<script type="text/javascript" src="../scripts/faq.js"></script>