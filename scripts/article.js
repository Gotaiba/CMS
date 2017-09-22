function addarticle(){
    var ArtTitle=$("#ArtTitle").val();
    var ArtSum=$("#ArtSum").val();   
    var data=new FormData($('#superform')[0]);
    data.append('ArtText',tinyMCE.get('ArtText').getContent());  
    $.ajax({
        type: "POST",
        url: "../ajax/AddArticle.php",
        data: data,
        contentType:false,
        processData:false,
        cache: false,
        success: function(result){
            $("#add_new_record_modal").modal("hide");
            if(result==1)            
                toastr.success('Article has been added successfuly', 'Success Alert', {timeOut: 5000});                
            else
                toastr.error('Error in saving the article', 'Inconceivable!', {timeOut: 5000});
                
            readArticles();
            $("#ArtTitle").val("");
            $(".editor").html(""); 
            $("#prv_Img").attr('src','../uploads/noImg.png');
            tinymce.get('ArtText').setContent('');
        }
    });
}
function UpdateArticle()
{ 
    var data=new FormData($('#superformUpdate')[0]);
    data.append('Update_ArtText',tinyMCE.get('Update_ArtText').getContent());
    $.ajax({
        type:"POST",
        url:"../ajax/UpdateArticle.php",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        success:function(result){
            $("#update_article_modal").modal("hide");        
            if(result==1)
                toastr.success('Article has been modified successfuly','Success Alert',{timeOut:5000});
            else
                toastr.error('Error in modifying article !','Error Alert',{timeOut:5000});
            readArticles();         
        }
    });
}


function readArticles(){
    $.get("../ajax/ReadArticles.php",{},function(data,status){
        $(".records_content").html(data);
    });
}

function GetArticleDetails(id)
{
    $("#ArticleId").val(id);
    $.post("../ajax/GetArticleDetails.php",{
        id:id
    },function(data,status){
        var article=JSON.parse(data);
        $("#Update_ArtTitle").val(article.Title);     
        tinymce.get('Update_ArtText').setContent(article.ArticleText);     
        $("#Update_prvImg").attr('src',article.ImageUrl);
    });
    $("#update_article_modal").modal("show");
}

function DeleteArticle(id) {
    var conf = confirm("Are you sure, do you really want to delete Article?");
    if (conf == true) {
        $.post("../ajax/DeleteArticle.php", {
                id: id
            },
            function (data, status) {    
                if(data==1 && status=="success")
                    toastr.success('Article has been deleted successfuly','Success Alert',{timeOut:5000});
                // reload Users by using readRecords();
                readArticles();
            }
        );
    }
}


function getMedia(){
    var rowid = $("#txt_rowid").val();
    var allcount = $("#txt_allcount").val();
        $.post("../ajax/GetMedia.php",{
            "rowid":rowid,
            "rowperpage":rowperpage
        },function(data,status){
           $("#media-list").html(data); 
        });
}

function getImgid(el)
{
    var id=$(el).find('span').text();
    $("#ImgId").val(id);
    $('li').removeClass('selected');
    $(el).parent().addClass('selected');
}

$(document).ready(function () {
    readArticles();
});