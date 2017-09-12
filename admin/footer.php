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
<script type="text/javascript" src="../tinymce/index.js"></script>
<script type="text/javascript" src="../js/toastr.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(document).ready(function() {
        //$("#txtEditor").Editor();
        //$("#ArtSum").Editor();
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
    function readURL_Update(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Update_prvImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
		
    </script>
</body>
</html>