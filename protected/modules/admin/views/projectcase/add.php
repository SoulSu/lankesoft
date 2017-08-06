<link href="../public/js/vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
<link href="../public/js/vendor/webuploader/dist/webuploader.css" rel="stylesheet">
<link href="../public/js/vendor/webuploader/mydemo/webuploader-demo.css" rel="stylesheet">
<script src="../public/js/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../public/js/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="../public/js/vendor/kindeditor/kindeditor-all-min.js"></script>

<script src="../public/js/vendor/webuploader/dist/webuploader.js"></script>
<div class="content_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>添加工程案例</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" role="form" method="post" action="/projectcase/add">
                                        <?php ?>
                                        <input type="hidden" name="id" value="<?php getModelData($model, 'id'); ?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">项目名称</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" name="title" type="text" placeholder="项目名称" value="<?php echo getModelData($model,'title')?>">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">所在地区</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="provice_code">
                                                    <option value="0">省</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="city_code">
                                                    <option value="0">市</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="area_code">
                                                    <option value="0">区</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <p class="col-sm-4 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">类型</label>
                                            <div class="col-sm-2">
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

                                            <p class="col-sm-8 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">项目中标时间</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" id="datepicker1" type="text"
                                                       value="<?php echo getModelData($model,'bid_time', time()); ?>" name="bid_time">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">项目规模</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" name="scale"><?php echo getModelData($model,'scale')?></textarea>
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">项目地点</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" name="address"><?php echo getModelData($model,'address')?></textarea>
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">项目概况</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="editor" name="overview"><?php echo getModelData($model,'overview')?></textarea>
                                            </div>
                                            <p class="col-sm-1 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">屈曲约束支撑应用情况</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="sitution" name="situation"><?php echo getModelData($model,'situation')?></textarea>
                                            </div>
                                            <p class="col-sm-1 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">项目施工完成情况</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" name="completion"><?php echo getModelData($model,'completion')?></textarea>
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">缩略图</label>
                                            <div class="col-sm-4">
                                                <div id="uploader">
                                                    <div class="queueList">
                                                        <div class="placeholder" id="dndArea">
                                                            <div id="filePicker"></div>
                                                            <p>将照片拖到这里</p>
                                                        </div>
                                                    </div>
                                                    <div class="statusBar" style="display:none;">
                                                        <div class="progress">
                                                            <span class="text">0%</span>
                                                            <span class="percentage"></span>
                                                        </div>
                                                        <div class="info"></div>
                                                        <div class="btns">
                                                            <div id="filePicker2"></div>
                                                            <div class="uploadBtn">开始上传</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">显示顺序</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" name="sort" type="text"
                                                       placeholder="显示顺序" value="<?php echo getModelData($model,'sort')?>">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">浏览量（前台）</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" name="views" type="text" placeholder=""
                                                       value="<?php echo getModelData($model,'views')?>">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>


                                        <hr>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button class="btn btn-primary J_ajaxSubmitBtn" type="submit">提交
                                                </button>
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
    (function () {
        //选择日期
        $('#datepicker1').datepicker({
            language: 'zh-CN',
            format: 'yyyy-mm-dd',
            zIndexOffset: 906  //控制z-index
        });

        var $textarea = $('#editor');
        var $sitution = $('#sitution');
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

        var sitution = KindEditor.create($sitution[0], {
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