function addarticle(){
    var ArtTitle=$("#ArtTitle").val();
    var ArtSum=$("#ArtSum").val();
    var ImgUrl="../uploads/"+$("#ArtImg").files[0].name;
    var ArtText=$("#Arttxt").val();
    
    $.post("ajax/AddArticle.php",{
        Title:ArtTitle,
        SmallDescription:ArtSum,
        LongDescription:ArtText,
        ImageUrl:ImgUrl,
        Posted:Date.now()
    }, function(data,status){
        $("#add_new_record_modal").modal("hide");
        readArticles();
        $("#ArtTitle").val("");
        $("#ArtSum").val("");
        $("#Arttxt").val("");
    });
}
function readArticles(){
    $.get("ajax/ReadArticles.php",{},function(data,status){
        $(".records_content").html(data);
    });
}