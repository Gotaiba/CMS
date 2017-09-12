tinymce.init({
    selector: '.editor',
    language: "en",
    height: 500,
    theme: 'modern',
     menubar:false,
    plugins: [
      'advlist autolink lists link  charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars fullscreen',
      'insertdatetime nonbreaking save table contextmenu directionality',
      'emoticons paste textcolor colorpicker textpattern  codesample toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    toolbar2: 'print preview | forecolor backcolor emoticons | codesample help',
    image_advtab: true
});

/*plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
],
   toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
*/