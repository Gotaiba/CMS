var validator;
function addevent() {  
    if($("#superform").valid())
        {
             var content=tinyMCE.get('EvtDes').getContent();
            if(content=='')
                {
                    $("#errContent").text('* Please enter the event content');
                    return false;
                }
             var data=new FormData($('#superform')[0]);
            data.append('EvtDes',tinyMCE.get('EvtDes').getContent());  
             var startDate = new Date($('#StartDate').val());
            var endDate = new Date($('#EndDate').val());            
            if (startDate > endDate) {
                $("#errstartDate").html("Start date is greater than end date !");
                $("#StartDate").focus();
                return false;
            }
            $.ajax({
                type: "POST",
                url: "../ajax/AddEvent.php",
                data: data,
                contentType:false,
                processData:false,
                cache: false,
                success: function(result){
                    $("#errContent").text('');
                    $("#add_new_record_modal").modal("hide");
                    if(result==1)            
                        toastr.success('Event has been added successfuly', 'Success Alert', {timeOut: 5000});                
                    else
                        toastr.error('Error in saving the event', 'Inconceivable!', {timeOut: 5000});

                    readEvents();
                    $("#EvtName").val("");
                    $(".editor").html(""); 
                    $("#prvImg").attr('src','../uploads/noImg.png');
                    tinymce.get('EvtDes').setContent('');
                }
            });

        }
    else
        {
            validator.focusInvalid();
        }
}

function readEvents(){
    $.get('../ajax/ReadEvents.php',{},function(data,status){       
        $('.records_content').html(data);
    })
}

function GetEventDetails(id){
    $("#EventId").val(id);
    $.post("../ajax/GetEventDetails.php",{
        id:id
    },function(data,status){
    var course=JSON.parse(data);
    $('.text-danger').text('');
    $('.error').text('');
    $("#EvtName").val(course.Name);
    $("#prvImg").attr('src','../'+course.ImageUrl);
    $("#StartDate").val(course.StartDate);
    $("#EndDate").val(course.EndDate);
    var des=decodeEntities(course.Description);
    des=decodeEntities(des);     
    tinymce.get('EvtDes').setContent(des);      
    //$("#btnSubmit").removeAttr('onclick');
    //$("#btnSubmit").attr('onclick','UpdateCourse()');
    //document.getElementById('btnSubmit').onclick = function () { UpdateCourse() }; 
    //$("#btnSubmit").text('Update');
        $("#btnSubmit").hide();
        $("#btnUpdate").show();
    });
    $("#add_new_record_modal").modal("show");
}

function UpdateEvent(){
     $("#EvtImg").rules("remove", "required");
     if($("#superform").valid()){
         var content=tinyMCE.get('EvtDes').getContent();
            if(content=='')
                {
                    $("#errContent").text('* Please enter the event content');
                    return false;
                }
         var data=new FormData($('#superform')[0]);
        data.append('EvtDes',tinyMCE.get('EvtDes').getContent());         
         var startDate = new Date($('#StartDate').val());
        var endDate = new Date($('#EndDate').val());        
        if (startDate > endDate) {
            $("#errstartDate").html("Start date is greater than end date !");
            $("#StartDate").focus();
            return false;
        }
        $.ajax({
            type: "POST",
            url: "../ajax/UpdateEvent.php",
            data: data,
            contentType:false,
            processData:false,
            cache: false,
            success: function(result){   
                $("#errContent").text('');
                alert(result);
                $("#add_new_record_modal").modal("hide");
                if(result==1)            
                    toastr.success('Event has been updated successfuly', 'Success Alert',{timeOut: 5000});                
                else
                    toastr.error('Error in updating the event', 'Inconceivable!', {timeOut: 5000});

                readEvents();
                $("#EvtName").val("");
                $(".editor").html(""); 
                $("#prvImg").attr('src','../uploads/noImg.png');
                tinymce.get('EvtDes').setContent('');
            }
        });
    }
    else
        validator.focusInvalid();    
}
function DeleteEvent(id){
    var conf = confirm("Are you sure, do you really want to delete event?");
    if (conf == true) {
        $.post("../ajax/DeleteEvent.php", {
                id: id
            },
            function (data, status) {    
                if(data==1 && status=="success")
                    toastr.success('Event has been deleted successfuly','Success Alert',{timeOut:5000});
                // reload Users by using readRecords();
                readEvents();
            }
        );
    }
}

$(document).ready(function () {
     
    readEvents();
    $("#btnAdd").click(function(){
        $("#btnUpdate").hide();
        $("#btnSubmit").show();
    });
    $('#add_new_record_modal').on('hidden.bs.modal', function () {
        $("#EvtName").val("");
        $("#StartDate").val('');
        $("#EndDate").val('');
        $(".editor").html(""); 
        $("#EvtImg").val('');
        $("#prvImg").attr('src','../uploads/noImg.png');
        tinymce.get('EvtDes').setContent('');
    });
     validator=$("#superform").validate({    
        rules: {
            EvtName: "required"
            , StartDate: "required"
            , EndDate: "required"
            , EvtImg:"required"
        }, messages: {
            EvtName: "* Please enter the event name",          
        },
        errorPlacement:function(error,element){
            if(element.attr('name')=="StartDate")                
                $("#errstartDate").html("* Please select event start date");              
            else if(element.attr('name')=="EndDate")
                $("#errendDate").text("* Please select event end end date"); 
            else if(element.attr('name')=="EvtImg")
                $("#errupload").text("* Please select event image");
            else                
                error.insertAfter(element);                
        }
    });
});


