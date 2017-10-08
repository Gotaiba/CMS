<?php include 'header.php';  ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Users</h1>
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
            <h3>All Users:</h3>
 
            <div class="records_content"></div>
        </div>
    </div>
</div>

<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="AddingUsers">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="AddingUsers">Add New User</h4>
            </div>
            <form action="" id="superform" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">            
                    <input type="hidden" id="UserId" name="UserId"/>
                    <div class="form-group">
                        <label for="FName" class="control-lable col-md-3">First Name</label>
                        <div class="col-md-8">
                            <input type="text" id="FName" name="FName" onkeypress="return blockChar(event , this)"  placeholder="First Name..." class="form-control"/>
                        </div>                
                    </div>
                    <br/> <br/>
                    <div class="form-group">
                        <label for="LName" class="control-lable col-md-3">Last Name</label>
                        <div class="col-md-8">
                            <input type="text" id="LName" name="LName" onkeypress="return blockChar(event , this)"  placeholder="Last Name..." class="form-control"/>
                        </div>                
                    </div> 
                    <br/> <br/>
                    <div class="form-group">
                        <label for="Email" class="control-lable col-md-3">Email</label>
                        <div class="col-md-8">
                            <input type="text" id="Email" name="Email" onkeypress="return blockChar(event , this)"  placeholder="example@example.com" class="form-control"/>
                        </div>                
                    </div> 
                    <br/> <br/>
                    <div class="form-group">
                        <label for="Usrname" class="control-lable col-md-3">Username</label>
                        <div class="col-md-7">
                            <input type="text" id="Usrname" name="Usrname" onkeypress="return blockChar(event , this)" placeholder="Username..." class="form-control"/>                             
                        </div>                
                    </div>  
                    <br/> <br/>
                    <div id="passSection">
                         <div class="form-group">
                            <label for="Usrname" class="control-lable col-md-3">Password</label>
                            <div class="col-md-7">
                                <input type="password" id="Password" name="Password" placeholder="*****" class="form-control"/>

                            </div>
                             <div class="col-md-2">
                                <span id="chkPass" class="passStr"></span>
                             </div>
                        </div>                  
                         <div class="form-group">
                            <label for="Usrname" class="control-lable col-md-3">Confirm Password</label>
                            <div class="col-md-7">
                                <input type="password" id="ConPassword" name="ConPassword" autocomplete=false placeholder="*****" class="form-control"/>
                            </div>                
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnUpdate" onClick="UpdateUser()">Update</button>
                <button type="button" class="btn btn-primary" id="btnSubmit" onClick="adduser()">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- // Modal -->


<?php include 'footer.php';  ?>
<script type="text/javascript" src="../scripts/user.js"></script>
<script type="text/javascript">

    function blockChar(e , element)
    {
        
        if(e.which == 39)
            {
                $(element).after('<span class="text-danger errmsg"> Not Allowed</span>');
                $(".errmsg").fadeOut("slow");
                return false;
            }
    }
    /*$("#Usrname").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything    
     if (e.which==39) {
        //display error message
        $("#errmsg").html("Not allowed").show().fadeOut("slow");
               return false;
    }        
   });*/
    
</script>