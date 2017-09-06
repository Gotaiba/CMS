function addarticle(){
    var ArtTitle=$("#ArtTitle").val();
    var ArtSum=$("#ArtSum").Editor("getText");
    var fileInput = document.getElementById('ArtImg');   
    var ImgUrl = "../uploads/"+fileInput.files[0].name;
    var ArtText=$("#txtEditor").Editor("getText");
    
    $.post("../ajax/AddArticle.php",{
       ArtTitle:Title,
        SmallDescription:ArtSum,
        LongDescription:ArtText,
        ImageUrl:ImgUrl
    }, function(data,status){
        $("#add_new_record_modal").modal("hide");
        readArticles();
        $("#ArtTitle").val("");
        $("#ArtSum").val("");
        $("#Arttxt").val("");
    });
}
function readArticles(){
    $.get("../ajax/ReadArticles.php",{},function(data,status){
        $(".records_content").html(data);
    });
}