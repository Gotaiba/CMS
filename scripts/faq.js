var validator;
function addquestion(){     
   if($("#superform").valid())
       {
              var data=new FormData($('#superform')[0]);          
            data.append('AnsText',tinyMCE.get('AnsText').getContent()); 
            var content=tinyMCE.get('AnsText').getContent();
            if(content=='')
                {
                    $("#errAnsText").text("* Please enter an Answer");
                    $("#QText").focus();
                    return false;
                }
            else{
                        $.ajax({
                type: "POST",
                url: "../ajax/Addfaq.php",
                data: data,
                contentType:false,
                processData:false,
                cache: false,
                success: function(result){                   
                    $("#add_new_record_modal").modal("hide");
                    if(result==1)            
                        toastr.success('Question has been added successfuly', 'Success Alert', {timeOut: 5000});                
                    else
                        toastr.error('Error in saving the Question', 'Inconceivable!', {timeOut: 5000});
                    
                    readfaq();  
                     $("#QText").val('');
                    tinyMCE.get('AnsText').setContent('');
                }
            });
            }
    
        }
    else
        validator.focusInvalid();
}

function GetFaqDetails(id)
{
    $("#FaqId").val(id);
    $.post("../ajax/GetFaqDetails.php",{
        id:id
    },function(data,status){
        var faq=JSON.parse(data);    
        $("#QText").val(faq.Question);
        tinymce.get('AnsText').setContent(faq.Answer);
        $("#btnSubmit").hide();
        $("#btnUpdate").show();
    });
    $("#add_new_record_modal").modal("show");
}

function UpdateFaq()
{
    if($("#superform").valid())
        {        
              var data=new FormData($('#superform')[0]);          
            data.append('AnsText',tinyMCE.get('AnsText').getContent()); 
            var content=tinyMCE.get('AnsText').getContent();
            if(content=='')
                {
                    $("#errAnsText").text("* Please enter an Answer");
                    $("#QText").focus();
                    return false;
                }
            else{
                        $.ajax({
                type: "POST",
                url: "../ajax/UpdateFaq.php",
                data: data,
                contentType:false,
                processData:false,
                cache: false,
                success: function(result){  
                    alert(result);
                    $("#add_new_record_modal").modal("hide");
                    if(result==1)            
                        toastr.success('Question has been updated successfuly', 'Success Alert', {timeOut: 5000});                
                    else
                        toastr.error('Error in updating the Question', 'Inconceivable!', {timeOut: 5000});                
                    
                    readfaq();
                    $("#QText").val('');
                    tinyMCE.get('AnsText').setContent('');                
                }
            });
            }
    
        } 
    else
        validator.focusInvalid();
}

function DeleteFaq(id)
{
    var conf = confirm("Are you sure, do you really want to delete this question ?");
    if (conf == true) {
        $.post("../ajax/DeleteFaq.php", {
                id: id
            },
            function (data, status) {    
                if(data==1 && status=="success")
                    toastr.success('Question has been deleted successfuly','Success Alert',{timeOut:5000});
                else
                     toastr.error('Error in Deleteing the question', 'Inconceivable!', {timeOut: 5000});
                readfaq();
            }
        );
    }
}


function readfaq(){
    $.get('../ajax/ReadFaq.php',{},function(data,status){
        $('.records_content').html(data);
    });
}

$(document).ready(function () {
    readfaq(); 
     $("#btnAdd").click(function(){
        $("#btnUpdate").hide();
        $("#btnSubmit").show();
    });
    $('#add_new_record_modal').on('hidden.bs.modal', function () {
        $("#QText").val("");    
        tinymce.get('AnsText').setContent('');
    });
    validator=$("#superform").validate({
        rules:{
            QText:"required"    
        },
        messages:{
            QText:"* Please enter a Question"         
        }
    });    
});
