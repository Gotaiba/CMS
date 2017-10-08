function saveHome(){
    
    var data=new FormData($("#HomePage")[0]);
    var order = $("#sortable").sortable("serialize");
    var jso=JSON.stringify(order);
    console.log(jso);
    data.append('ID',jso);
    $.ajax({
        type:"POST",
        url:"../ajax/SaveHome.php",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        success:function(result){ 
             console.log(result);
            if(result==1)            
                toastr.success('Home page details has been saved successfuly', 'Success Alert', {timeOut: 5000});                
            else
                toastr.error('Error in saving home page details', 'Inconceivable!', {timeOut: 5000});
        }
        
    })
    
}
function saveAbout(){
    tinyMCE.triggerSave();
    var data=new FormData($("#AboutPage")[0]);
    $.ajax({
        type:"POST",
        url:"../ajax/SaveAbout.php",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        success:function(result){            
            if(result==1)            
                toastr.success('About page details has been Sdaved successfuly', 'Success Alert', {timeOut: 5000});                
            else
                toastr.error('Error in saving about page details', 'Inconceivable!', {timeOut: 5000});
        }
        
    });
    
}
function saveLibrary(){
    tinyMCE.triggerSave();
    var data=new FormData($("#LibraryPage")[0]);
    $.ajax({
        type:"POST",
        url:"../ajax/SaveLibrary.php",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        success:function(result){             
            if(result==1)            
                toastr.success('Library page details has been Sdaved successfuly', 'Success Alert', {timeOut: 5000});                
            else
                toastr.error('Error in saving library page details', 'Inconceivable!', {timeOut: 5000});
        }
        
    });
    
}
function saveCourse(){
     tinyMCE.triggerSave();
    var data=new FormData($("#CoursePage")[0]);
    $.ajax({
        type:"POST",
        url:"../ajax/SaveCourse.php",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        success:function(result){           
            if(result==1)            
                toastr.success('Course page details has been Sdaved successfuly', 'Success Alert', {timeOut: 5000});                
            else
                toastr.error('Error in saving course page details', 'Inconceivable!', {timeOut: 5000});
        }
        
    });
    
}
$(document).ready(function(){
    $( "#sortable" ).sortable({
        opacity: 0.6, 
         cursor: 'move'
    });
    $( "#sortable" ).disableSelection();
    $.get('../ajax/GetPages.php',{},function(data,status){
        tinyMCE.triggerSave();
        var page=JSON.parse(data);
        $("#HomeTitle").val(decodeEntities(page[1].Title));
        $("#HomeSubtitle").val(decodeEntities(page[1].Subtitle));
        //----------About--------------
        $("#AbtTitle").val(decodeEntities(page[0].Title));
        $("#AbtSubtitle").val(decodeEntities(page[0].Subtitle));
        if(page[0].ImageUrl!=null)
            $("#prvImgAbt").attr('src','../'+page[0].ImageUrl);    
        $("#AbtContent").html(decodeEntities(page[0].Content));
        //------------Library--------------
        $("#LibTitle").val(decodeEntities(page[3].Title));
        $("#LibSubtitle").val(decodeEntities(page[3].Subtitle));
        if(page[3].ImageUrl!=null)
            $("#prvImgLib").attr('src','../'+page[3].ImageUrl);    
        $("#LibContent").html(page[3].Content);
        //------------Course----------------
        $("#CrsTitle").val(decodeEntities(page[2].Title));
        $("#CrsSubtitle").val(decodeEntities(page[2].Subtitle));
        if(page[2].ImageUrl!=null)
            $("#prvImgCrs").attr('src','../'+page[2].ImageUrl);
        $('#CrsContent').html(page[2].Content);    
    });
});