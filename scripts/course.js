var validator;
function addcourse() {  
    if($("#superform").valid())
        {
             var data=new FormData($('#superform')[0]);
            data.append('CrsDes',tinyMCE.get('CrsDes').getContent());  
            var price=$("#CrsPrice").val();
            var chked=($("#chkbox-unsp").is(":checked"))? 1:0;
             var startDate = new Date($('#StartDate').val());
            var endDate = new Date($('#EndDate').val());
            if(price=='' && chked==0)
                {
                    $("#errmsg").html('Please enter price or check unspecified');
                    $("#CrsPrice").focus();
                    return false;
                }
            if (startDate > endDate) {
                $("#errstartDate").html("Start date is greater than end date !");
                $("#StartDate").focus();
                return false;
            }
            $.ajax({
                type: "POST",
                url: "../ajax/AddCourse.php",
                data: data,
                contentType:false,
                processData:false,
                cache: false,
                success: function(result){           
                    $("#add_new_record_modal").modal("hide");
                    if(result==1)            
                        toastr.success('Course has been added successfuly', 'Success Alert', {timeOut: 5000});                
                    else
                        toastr.error('Error in saving the course', 'Inconceivable!', {timeOut: 5000});

                    readCourses();
                    $("#CrsName").val("");
                    $(".editor").html(""); 
                    $("#CrsImg").val('');
                    $("#prvImg").attr('src','../uploads/noImg.png');
                    tinymce.get('CrsDes').setContent('');
                }
            });

        }
    else
        {
            validator.focusInvalid();
        }
}

function readCourses(){
    $.get('../ajax/ReadCourses.php',{},function(data,status){       
        $('.records_content').html(data);
    })
}

function GetCourseDetails(id){
    
    $("#CourseId").val(id);
    $.post("../ajax/GetCourseDetails.php",{
        id:id
    },function(data,status){
    var course=JSON.parse(data);
    $('.text-danger').text('');
    $('.error').text('');
    $("#CrsName").val(course.Name);
    $("#CrsPrice").val(course.Price);
    $("#prvImg").attr('src',course.ImageUrl);
    $("#StartDate").val(course.StartDate);
    $("#EndDate").val(course.EndDate);
    tinymce.get('CrsDes').setContent(course.Description);
    //$("#btnSubmit").removeAttr('onclick');
    //$("#btnSubmit").attr('onclick','UpdateCourse()');
    //document.getElementById('btnSubmit').onclick = function () { UpdateCourse() }; 
    //$("#btnSubmit").text('Update');
        $("#btnSubmit").hide();
        $("#btnUpdate").show();
    if($("#CrsPrice").val()=="0")
        {
            $("#chkbox-unsp").attr('checked',true);
            $("#CrsPrice").attr('readOnly',true);
        }   
    });
    $("#add_new_record_modal").modal("show");
}

function UpdateCourse(){
     $("#CrsImg").rules("remove", "required");
     if($("#superform").valid()){
         var data=new FormData($('#superform')[0]);
        data.append('CrsDes',tinyMCE.get('CrsDes').getContent());  
        var price=$("#CrsPrice").val();
        var chked=($("#chkbox-unsp").is(":checked"))? 1:0;
         var startDate = new Date($('#StartDate').val());
        var endDate = new Date($('#EndDate').val());
        if(price=='' && chked==0)
            {
                $("#errmsg").html('Please enter price or check unspecified');
                $("#CrsPrice").focus();
                return false;
            }
        if (startDate > endDate) {
            $("#errstartDate").html("Start date is greater than end date !");
            $("#StartDate").focus();
            return false;
        }
        $.ajax({
            type: "POST",
            url: "../ajax/UpdateCourse.php",
            data: data,
            contentType:false,
            processData:false,
            cache: false,
            success: function(result){           
                $("#add_new_record_modal").modal("hide");
                if(result==1)            
                    toastr.success('Course has been updated successfuly', 'Success Alert',{timeOut: 5000});                
                else
                    toastr.error('Error in updating the course', 'Inconceivable!', {timeOut: 5000});

                readCourses();
                $("#CrsName").val("");
                $(".editor").html(""); 
                $("#CrsImg").val('');
                $("#prvImg").attr('src','../uploads/noImg.png');
                tinymce.get('CrsDes').setContent('');
            }
        });
    }
    else
        validator.focusInvalid();    
}
function DeleteCourse(id){
    var conf = confirm("Are you sure, do you really want to delete Course?");
    if (conf == true) {
        $.post("../ajax/DeleteCourse.php", {
                id: id
            },
            function (data, status) {    
                if(data==1 && status=="success")
                    toastr.success('Course has been deleted successfuly','Success Alert',{timeOut:5000});
                // reload Users by using readRecords();
                readCourses();
            }
        );
    }
}

$(document).ready(function () {
     
    readCourses();
    $("#btnAdd").click(function(){
        $("#btnUpdate").hide();
        $("#btnSubmit").show();
    });
    $('#add_new_record_modal').on('hidden.bs.modal', function () {
        $("#CrsName").val("");
        $("#CrsPrice").val('');
        $("#StartDate").val('');
        $("#EndDate").val('');
        $("#CrsImg").val('');
        $(".editor").html(""); 
        $("#prvImg").attr('src','../uploads/noImg.png');
        tinymce.get('CrsDes').setContent('');
    });
     validator=$("#superform").validate({    
        rules: {
            CrsName: "required"
            , StartDate: "required"
            , EndDate: "required"
            , CrsImg:"required"
        }, messages: {
            CrsName: "* Please enter the course name",          
        },
        errorPlacement:function(error,element){
            if(element.attr('name')=="StartDate")                
                $("#errstartDate").html("* Please select course start date");              
            else if(element.attr('name')=="EndDate")
                $("#errendDate").text("* Please select course end end date"); 
            else if(element.attr('name')=="CrsImg")
                $("#errupload").text("* Please select course image");
            else                
                error.insertAfter(element);                
        }
    });
});


