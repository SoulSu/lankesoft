<link rel="stylesheet" href="../public/js/vendor/DataTables/css/dataTables.bootstrap.css">
<script src="../public/js/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../public/js/vendor/DataTables/js/dataTables.bootstrap.min.js"></script>
<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>分类列表</header>
                    <section>
                        <div class="container-fluid">
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group" style="margin-bottom:20px;">
                                        <a class="btn btn-default" href="#admin/class/add?cate_id=<?php echo $cate_id;?>"><i class="fa-file-o"></i>添加分类</a>
                                    </div>
                                </div>
                          </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="example" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="80">id</th>
                                                <th>名称</th>
                                                <th width="140">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($lists as $cate){?>
                                            <tr>
                                                <td><?php echo $cate->id?></td>
                                                <td><?php echo $cate->name?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs" href="/admin/class/edit?cate_id=<?php echo $cate_id?>&id=<?php echo $cate->id?>">编辑</a>
                                                    <button class="btn btn-warning btn-xs J_confirm_modal" data-target="/admin/class/delete?id=<?php echo $cate->id?>" data-tip="一定要删除？" type="button">删除</button>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <!--分页 S-->
                <div class="pager">
                <?php $this->widget('CLinkPagerCustom',array(
                    'header' => '',
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '最后一页',
                    'prevPageLabel' => '上一页',
                    'nextPageLabel' => '下一页',
                    'pages' => $pages,
                    'maxButtonCount'=>3,
                    'htmlOptions' =>array('class'=>''),
                    'nextPageCssClass' => '',
                    'previousPageCssClass' => '',
                ));?>
                </div>
                <!--分页 E-->
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            paging: false,
            /*lengthChange: false,
            searching: false,
            ordering: false,
            info: false,*/
            scrollX: true,
            "language": {
                url:'../public/js/vendor/DataTables/Chinese.json'
            }
        });
    });
</script>