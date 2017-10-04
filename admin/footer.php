                    </div>
                </div>
            </div>
        </div>                                                                 
</a>   

	</div>
</div>
<script type="text/javascript" src="../js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/Chart.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/toastr.min.js"></script>

<script>
   tinymce.init({
    selector: '.editor',
        theme: 'modern',
     menubar:false,
    plugins: [
      'advlist autolink lists print preview hr',
      'searchreplace wordcount visualblocks visualchars fullscreen',
      'insertdatetime save table contextmenu directionality',
      'paste textcolor colorpicker textpattern  toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    toolbar2: 'print preview | forecolor backcolor | codesample help',
        height: '200',
    width : 550
  });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];  
    function readURL(input) {
        $("#errupload").text('');
        var iFileSize = input.files[0].size;
        var iConvert = (iFileSize / 1048576).toFixed(2);
        if (input.type == "file") {
            var sFileName = input.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                var sizeValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                if (iConvert <= 2.0)
                    sizeValid = true;
                if (!blnValid) {
                    $("#errupload").text("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    input.value = "";
                    return false;
                }
                if (!sizeValid) {
                    $("#errupload").text('* The Image size is too large. Maximum size allowed(2.0MB)');
                    input.value = "";
                    return false;
                }
                if (blnValid && sizeValid) {
                    if (input.files && input.files[0])
                        var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#prvImg').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }
    }  
    function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
    }
     function prvImage(input,el) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(el).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
       function readURL_Update(input) {
           $("#errupload2").text('');
        var iFileSize = input.files[0].size;
        var iConvert = (iFileSize / 1048576).toFixed(2);
        if (input.type == "file") {
            var sFileName = input.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                var sizeValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                if (iConvert <= 2.0)
                    sizeValid = true;
                if (!blnValid) {
                    $("#errupload2").text("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    input.value = "";
                    return false;
                }
                if (!sizeValid) {
                    $("#errupload2").text('* The Image size is too large. Maximum size allowed(2.0MB)');
                    input.value = "";
                    return false;
                }
                if (blnValid && sizeValid) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#Update_prvImg').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }
        }
    }  
    $(document).ready(function(){
        var path = window.location.pathname.substring(4);        
        $('.sidebar-nav>li>a[href="..' + path + '"]').addClass('current');
        $('#add_new_record_modal').on('hidden.bs.modal', function () {
            $("#errupload").text('');
            $("#errupload2").text('');
        });        
    })
		
    </script>
</body>
</html>