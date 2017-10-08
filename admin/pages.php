<?php include 'header.php'?>
<?php
    include('../db/connect.php');
    $query="select * from navigation order by OrderNo";
    $result=mysqli_query($db,$query)
    
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Pages</h1>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                <li role="presentation"><a href="#About" aria-controls="profile" role="tab" data-toggle="tab">About</a></li>
                <li role="presentation"><a href="#Library" aria-controls="messages" role="tab" data-toggle="tab">Library</a></li>
                <li role="presentation"><a href="#Course" aria-controls="settings" role="tab" data-toggle="tab">Course</a></li>
            </ul>

      <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <form method="post" id="HomePage" action="" class="form-horizontal">
                    <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-lable col-md-3">Home Page Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="HomeTitle" id="HomeTitle" placeholder="Home Title...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-lable col-md-3">Home Page Subtitle</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="HomeSubtitle" id="HomeSubtitle" placeholder="Home Subtitle...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-lable col-md-3">Sort Menu</label>
                            <div class="col-md-9">
                                <ul id="sortable">
                                    <?php
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            echo '<li id="ID_'.$row['Id'].'"><span><i class="fa fa-arrows" aria-hidden="true"></i></span> <input type="text" name="Nav_'.$row['Id'].'" class="form-control" value="'.$row['Name'].'" /></li>';
                                        }
                                    ?>
                                </ul>
                                <span id="sortmsg" class="text-info"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="button" class="btn btn-primary" onclick="saveHome()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>                                        
              </div>
            <div role="tabpanel" class="tab-pane fade" id="About">
                 <form method="post" id="AboutPage" action="" class="form-horizontal">
                    <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-lable col-md-3">About Page Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="AbtTitle" id="AbtTitle" placeholder="About Title...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-lable col-md-3">About Page Subtitle</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="AbtSubtitle" id="AbtSubtitle" placeholder="About Subtitle...">
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="control-lable col-md-3">Select About Image</label>
                              <div class="row">
                                <div class="col-md-5">
                                    <div class="thumbnailcus">
                                        <img src="../img/noImg.png" name="prvImgAbt" id="prvImgAbt">
                                    </div>

                                 </div>
                                 <div class="col-md-3">
                                     <div class="fileUpload btn btn-default">
                                            <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                            <input type="file" class="upload" name="AbtImg" id="AbtImg" onchange="prvImage(this,prvImgAbt);" />
                                    </div>                        
                                 </div>
                             </div>                 
                        </div>  
                         <div class="form-group">
                            <label class="control-lable col-md-3">About Page Content</label>
                            <div class="col-md-9">
                                <textarea class="editor" id="AbtContent" name="AbtContent"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn btn-primary" onclick="saveAbout()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>           
              </div>
            <div role="tabpanel" class="tab-pane fade" id="Library">
                <form method="post" id="LibraryPage" action="" class="form-horizontal">
                    <div class="row">                        
                    <div class="col-md-8 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-lable col-md-3">Library Page Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="LibTitle" id="LibTitle" placeholder="Library Title...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-lable col-md-3">Library Page Subtitle</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="LibSubtitle" id="LibSubtitle" placeholder="Library Subtitle...">
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="control-lable col-md-3">Select Library Image</label>
                              <div class="row">
                                <div class="col-md-5">
                                    <div class="thumbnailcus">
                                        <img src="../img/noImg.png" name="prvImgLib" id="prvImgLib">
                                    </div>

                                 </div>
                                 <div class="col-md-3">
                                     <div class="fileUpload btn btn-default">
                                            <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                            <input type="file" class="upload" name="LibImg" id="LibImg" onchange="prvImage(this,prvImgLib);" />
                                    </div>                        
                                 </div>
                             </div>                 
                        </div>  
                         <div class="form-group">
                            <label class="control-lable col-md-3">Library Page Content</label>
                            <div class="col-md-9">
                                <textarea class="editor" id="LibContent" name="LibContent"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn btn-primary" onclick="saveLibrary()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form> 
              </div>
            <div role="tabpanel" class="tab-pane fade" id="Course">
                 <form method="post" id="CoursePage" action="" class="form-horizontal">
                    <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-lable col-md-3">Course Page Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="CrsTitle" id="CrsTitle" placeholder="Course Page Title...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-lable col-md-3">Course Page Subtitle</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="CrsSubtitle" id="CrsSubtitle" placeholder="Course Page Subtitle...">
                            </div>
                        </div>
                         <div class="form-group">
                             <label class="control-lable col-md-3">Select Course Image</label>
                              <div class="row">
                                <div class="col-md-5">
                                    <div class="thumbnailcus">
                                        <img src="../img/noImg.png" name="prvImgCrs" id="prvImgCrs">
                                    </div>

                                 </div>
                                 <div class="col-md-3">
                                     <div class="fileUpload btn btn-default">
                                            <i class="fa fa-upload" aria-hidden="true"></i>&nbsp;&nbsp;<span>Upload</span>
                                            <input type="file" class="upload" name="CrsImg" id="CrsImg" onchange="prvImage(this,prvImgCrs);" />
                                    </div>                        
                                 </div>
                             </div>                 
                        </div>  
                         <div class="form-group">
                            <label class="control-lable col-md-3">Course Page Content</label>
                            <div class="col-md-9">
                                <textarea class="editor" id="CrsContent" name="CrsContent"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn btn-primary" onclick="saveCourse()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form> 
              </div>
          </div>
        </div>
    </div>
</div>


<?php include 'footer.php'?>
<script type="text/javascript" src="../scripts/pages.js"></script>