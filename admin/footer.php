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
<script type="text/javascript" src="../js/canvasjs.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/toastr.min.js"></script>

<script>
   tinymce.init({
    selector: '.editor',
        theme: 'modern',
     menubar:false,
    plugins: [
      'advlist autolink lists link  charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars fullscreen',
      'insertdatetime nonbreaking save table contextmenu directionality',
      'paste textcolor colorpicker textpattern  codesample toc'
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
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#prvImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
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
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Update_prvImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    $(document).ready(function(){
        var path = window.location.pathname.substring(4);        
        $('.sidebar-nav>li>a[href="..' + path + '"]').addClass('current');
    })
		
    </script>
</body>
</html>