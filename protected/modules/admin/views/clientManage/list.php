<link rel="stylesheet" href="../public/js/vendor/DataTables/css/dataTables.bootstrap.css">
<script src="../public/js/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../public/js/vendor/DataTables/js/dataTables.bootstrap.min.js"></script>

<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>客户列表</header>
                    <section>
                        <div class="container-fluid">
                          <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group" style="margin-bottom:20px;">
                                        <a class="btn btn-default" href="#clientManage/add.html"><i class="fa fa-file-o"></i>添加客户</a>
                                    </div>
                                </div>
                          </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>客户名称</th>
                                            <th>客户分类</th>
                                            <th>最后更新时间</th>
                                            
                                            <th></th>
                                        </tr>
                                        </thead>
                                      	
                                        <tbody>
                                        <?php
                                        /** @var Customer $list */
                                        foreach ($CustomerList as $list){?>
                                        <tr>
                                            <td><?php echo $list->id?></td>
                                            <td><?php echo $list->name?></td>
                                            <td><?php echo $list->cate->name?></td>
                                            <td><?php echo date('Y-m-d',$list->mtime)?></td>
                          
                                            <td>
                                              <a href="#clientManage/edit.html?id=<?php echo $list->id?>">编辑</a>
                                              <a href="#clientManage/delete.html?id=<?php echo $list->id?>">删除</a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
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