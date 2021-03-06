<link rel="stylesheet" href="../public/js/vendor/webuploader/dist/webuploader.css">
<link rel="stylesheet" href="../public/js/vendor/webuploader/mydemo/webuploader-demo.css">


<script src="../public/js/vendor/webuploader/dist/webuploader.js"></script>
<div class="content_wrapper">
    <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>添加相片</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" role="form" method="post" action="/life/add.html">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">标题</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="标题" name="title" value="<?php echo  getModelData($model,'title');?>">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                    
                                       
                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">照片</label>
                                            <div class="col-sm-4">
                                              <div id="uploader">
                                                  <div class="queueList">
                                                      <div id="dndArea" class="placeholder">
                                                          <div id="filePicker"></div>
                                                          <p>将照片拖到这里</p>
                                                      </div>
                                                  </div>
                                                  <div class="statusBar" style="display:none;">
                                                      <div class="progress">
                                                          <span class="text">0%</span>
                                                          <span class="percentage"></span>
                                                      </div><div class="info"></div>
                                                      <div class="btns">
                                                          <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                             <p class="col-sm-6 help-block"></p>
                                        </div> 
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">显示顺序</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="显示顺序" name="sort"
                                                       value="<?php echo getModelData($model,'sort');?>"/>
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        
                                        <hr/>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary J_ajaxSubmitBtn">提交</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</div>
<script src="../public/js/vendor/webuploader/mydemo/article-upload.js"></script>
<script>
  
</script>