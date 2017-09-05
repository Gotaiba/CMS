                    </div>
                </div>
            </div>
        </div>                                                                 
</a>   

	</div>
</div>
<script type="text/javascript" src="../js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/editor.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(document).ready(function() {
        $("#txtEditor").Editor();
        $("#ArtSum").Editor();
    });
		
    </script>
</body>
</html>