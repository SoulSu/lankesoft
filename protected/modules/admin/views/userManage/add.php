<link rel="stylesheet" href="../public/js/vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.min.css">
<script src="../public/js/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../public/js/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="../public/js/vendor/kindeditor/kindeditor-all-min.js"></script>
<div class="content_wrapper">
    <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>添加用户</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" role="form" method="get" action="../server/ajaxReturn.json" data-validate="validate2">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">用户名</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="用户名" name="title">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">姓名</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="姓名" name="title">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">密码</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="密码" name="title">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                           <div class="form-group">
                                            <label class="col-sm-2 control-label">确认密码</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="确认密码" name="title">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                           <div class="form-group">
                                            <label class="col-sm-2 control-label">电子邮件</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="电子邮件" name="title">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">性别</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="category">
                                                    <option value="0">保密</option>
                                                    <option value="1">男</option>
                                                    <option value="2">女</option>
                                                </select>
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">出生年月</label>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control" id="datepicker1" value="2016-10-16"/>
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">公司名称</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="公司名称" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">公司地址</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="公司地址" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">公司电话</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="公司电话" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">个人地址</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="个人地址" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">个人电话</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="个人电话" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">QQ</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="QQ" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">MSN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="MSN" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">博客</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="博客" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">身份证号</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="身份证号" name="author">
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">特约用户</label>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="checkbox" name="audit" value="1" >
                                                    </label>
                                                </div>
                                              
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
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