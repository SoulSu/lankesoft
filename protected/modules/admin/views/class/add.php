<div class="content_wrapper">
    <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>添加分类</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" role="form" action="/admin/class/add" method="post">
                                        <input type="hidden" name="cate_id" value="<?php echo $cate_id;?>">
                                        <input type="hidden" name="id" value="<?php echo getModelData($model,'id');?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">标题</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="分类名称" name="name" value="<?php echo getModelData($model,'name')?>">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr/>

                                        <!--<div class="form-group">
                                            <label class="col-sm-2 control-label">分类</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="category">
                                                    <option value="0">请选择</option>
                                                    <?php /*foreach (Cate::getAllCate() as $cate_key=>$cate_val){*/?>
                                                    <option value="<?php /*echo $cate_key*/?>"><?php /*echo $cate_val*/?></option>
                                                    <?php /*}*/?>
                                                </select>
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>-->



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
