<link rel="stylesheet" href="../public/js/vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.min.css">
<link rel="stylesheet" href="../public/js/vendor/webuploader/dist/webuploader.css">
<link rel="stylesheet" href="../public/js/vendor/webuploader/mydemo/webuploader-demo.css">
<script src="../public/js/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../public/js/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="../public/js/vendor/kindeditor/kindeditor-all-min.js"></script>

<script src="../public/js/vendor/webuploader/dist/webuploader.js"></script>
<div class="content_wrapper">
    <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>添加文章</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" role="form" method="post" action="/article/add.html">
                                        <?php echo CHtml::errorSummary($form); ?>
                                        <input type="hidden" name="id" value="<?php echo getModelData($model, 'id') ?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">标题</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="新闻标题" name="title"
                                                       value="<?php echo getModelData($model, 'title') ?>" />
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">分类</label>
                                            <div class="col-sm-4">
                                                <?php
                                                $_cate = getModelData($model,'cate', null);
                                                ?>
                                                <select class="form-control" name="category">
                                                    <?php /** @var Cate $cate */
                                                    foreach ($cates as $cate) { ?>
                                                        <option value="<?php echo $cate->id; ?>" <?php if ($_cate !== null && $cate->id == $_cate->id){echo "selected='selected'";}?>>
                                                            <?php echo $cate->name; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">发布日期</label>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" id="datepicker1" name="releasetime"
                                                     value="<?php echo date('Y-m-d', getModelData($model,'releasetime', time()));?>" />
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">作者</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="作者" name="author" value="<?php echo getModelData($model,'author')?>">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">简介</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" name="describe"><?php echo getModelData($model,'describe')?></textarea>
                                            </div>
                                             <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">缩略图</label>
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
                                             <p class="col-sm-6 help-block">必填</p>
                                        </div> 
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">内容</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="editor" name="content"><?php echo getModelData($model,'content')?></textarea>
                                            </div>
                                             <p class="col-sm-1 help-block">必填</p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">显示顺序</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="显示顺序" name="sort" value="<?php echo getModelData($model,'sort')?>">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">是否审核通过</label>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ispass" value="1" <?php echo getModelData($model,'ispass') == 1 ? 'checked' :''?>>通过
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="ispass" value="0" <?php echo getModelData($model,'ispass') == 0 ? 'checked' :''?>>未通过
                                                    </label>
                                                </div>
                                            </div>
                                            <p class="col-sm-6 help-block">如果是未通过，则此条新闻不在网站前台显示</p>
                                        </div>
                                       
                                       
                                        <hr/>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" class="btn btn-primary J_ajaxSubmitBtn">提交</button>
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
  (function(){
       //选择日期
    $('#datepicker1').datepicker({
      language:'zh-CN',
      format:'yyyy-mm-dd',
      zIndexOffset:906  //控制z-index
    });

    var $textarea = $('#editor');
    var editor = KindEditor.create($textarea[0], {
        themeType: 'default',
        langType: 'zh-CN',
        basePath: '../public/js/vendor/kindeditor/',
        themesPath: '../public/js/vendor/kindeditor/themes/',
        pluginsPath: '../public/js/vendor/kindeditor/plugins/',
        langPath: '../public/js/vendor/kindeditor/lang/',
        filePostName: 'imgFile',    //imgFile是编辑器中图片上传的默认表单域名称
        width: '100%',
        minHeight: 200,    //最小高度，不用写px单位
        resizeType: 1,     //2时可以拖动改变宽度和高度，1时只能改变高度，0时不能拖动。
        allowPreviewEmoticons: true,  //允许预览表情图片
        allowImageUpload: true,       //允许本地上传图片
        allowFileManager: false,      //true时显示浏览远程服务器按钮
        //上传图片、Flash、视音频、文件时，支持添加别的参数一并传到服务器
        extraFileUploadParams: '{"uid":250}',
        afterBlur: function () {
            //编辑器失去焦点时，同步编辑器中的内容到textarea，在异步提交内容的时候，必须写！否则textarea中的值是不会改变的
            this.sync();
        },
        uploadJson: '../server/upload.php',
        items: [
          'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
          'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
          'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
          'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
          'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
          'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
          'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
          'anchor', 'link', 'unlink', '|', 'about'
      ]
    });
  })();
</script>