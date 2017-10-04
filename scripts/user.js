var validator;
function adduser(){
    if($("#superform").valid())
        {
            var data=new FormData($("#superform")[0]);
            $.ajax({
                type: "POST",
                url: "../ajax/AddUser.php",
                data: data,
                contentType:false,
                processData:false,
                cache: false,
                success: function(result){                    
                    $("#add_new_record_modal").modal("hide");
                    if(result==1)            
                        toastr.success('User has been added successfuly', 'Success Alert', {timeOut: 5000});                
                    else if(result==2)
                        toastr.warning('Username is existed try another one', 'Warning Alert',{timeOut:5000});
                    else
                        toastr.error('Error in saving the user', 'Inconceivable!', {timeOut: 5000});

                    ReadUsers();
                    $("#FName").val("");
                    $("#LName").val("");              
                    $("#Usrname").val('');
                    $("#Email").val('');
                    $("#Password").val('');
                    $("#ConPassword").val('');
                }
            });

        }
    else
        {
            validator.focusInvalid();
        }
}

function UpdateUser(){
    if($("#superform").valid())
        {
            var data=new FormData($("#superform")[0]);
            $.ajax({
                type: "POST",
                url: "../ajax/UpdateUser.php",
                data: data,
                contentType:false,
                processData:false,
                cache: false,
                success: function(result){                               
                    $("#add_new_record_modal").modal("hide");
                    if(result==1)            
                        toastr.success('User has been updated successfuly', 'Success Alert', {timeOut: 5000});                
                    else
                        toastr.error('Error in updating the user', 'Inconceivable!', {timeOut: 5000});

                    ReadUsers();
                    $("#FName").val("");
                    $("#LName").val("");              
                    $("#Usrname").val('');
                    $("#Email").val('');
                }
            });

        }
    else
        {
            validator.focusInvalid();
        }
}

function GetUserDetails(id){
     $("#UserId").val(id);
    $.post("../ajax/GetUserDetails.php",{
        id:id
    },function(data,status){
        
        var usr=JSON.parse(data);    
        $("#FName").val(usr.FirstName);
        $("#LName").val(usr.LastName);
        $("#Usrname").val(usr.Username);
        $("#Email").val(usr.Email);
        $("#passSection").hide();
        $("#ConPassword").hide();
        $("#btnSubmit").hide();
        $("#btnUpdate").show();
    });
    $("#add_new_record_modal").modal("show");
}

function DeleteUser(id)
{
     var conf = confirm("Are you sure, do you really want to delete this user ?");
    if (conf == true) {
        $.post("../ajax/DeleteUser.php", {
                id: id
            },
            function (data, status) {             
                if(data==1 && status=="success")
                    toastr.success('User has been deleted successfuly','Success Alert',{timeOut:5000});
                else
                     toastr.error('Error in Deleteing the user', 'Inconceivable!', {timeOut: 5000});
                ReadUsers();
            }
        );
    }
}
function ReadUsers(){
    $.get('../ajax/ReadUsers.php',{},function(data,status){
        $('.records_content').html(data);
        $(".reset").hide();
    });
}

function RestPass(id,input)
{
    $(input).next('div').show();
    $(input).text("Save");
    $(input).attr('onclick','saveRest('+id+')');
}
function saveRest(id)
{
    var newpass=$('#resetPass'+id).val();
    $.post("../ajax/ResetPass.php",{
           id:id,
            Pass:newpass
           },function(data,status) {
        if(data==1 && status=="success")
                    toastr.success('User has been deleted successfuly','Success Alert',{timeOut:5000});
                else
                     toastr.error('Error in Deleteing the user', 'Inconceivable!', {timeOut: 5000});
    });   
    var btnreset='<i class="fa fa-repeat" aria-hidden="true"></i> Reset'
    $('#resetPass'+id).parent().prev().html(btnreset);
    $('#resetPass'+id).parent().prev().attr('onclick','RestPass('+id+',this)');
     $('#resetPass'+id).val('');
    $(".reset").hide();
    
}

$("#Password").keyup(function (e){
    var pass=$("#Password").val();
    if(pass.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%* #=+\(\)\^?&])[A-Za-z\d$@$!%* #=+\(\)\^?&]{3,}$/))
    {
        $("#chkPass").removeClass('weakPass');
        $("#chkPass").addClass('strongPass');
        $("#chkPass").text('Strong');   
    }
    else
    {
       
        $("#chkPass").removeClass('strongPass');
        $("#chkPass").addClass('weakPass');
        $("#chkPass").text('Weak');
        
    }            
});



$(document).ready(function () {
     
    ReadUsers();
    $("#btnAdd").click(function(){
        $("#btnUpdate").hide();
        $("#btnSubmit").show();
        $("#passSection").show();
    });
    $('#add_new_record_modal').on('hidden.bs.modal', function () {
        $("#FName").val("");
        $("#LName").val('');
        $("#Usrname").val('');
        $("#Email").val('');
        $("#Password").val('');    
        $("#ConPassword").val('');
        $("#chkPass").removeClass('strongPass');
         $("#chkPass").removeClass('weakPass');
         $("#chkPass").text('');
    });
     validator=$("#superform").validate({    
        rules: {
            FName: "required",
            LName: "required",
            Usrname: "required",
            Password:"required",
            Email:{
                required:true,
                email:true
            },
            ConPassword:{
                equalTo:"#Password"
            }
            
        }, messages: {
            FName: "* Please enter the first name",
            LName: "* Please enter the last name",
            Email:"* Please enter the Email",
            Usrname:"* Please enter the username",
            Password:"* Please enter the Password"
        }
     });
});
