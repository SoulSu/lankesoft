<link rel="stylesheet" href="../public/js/vendor/DataTables/css/dataTables.bootstrap.css">
<script src="../public/js/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../public/js/vendor/DataTables/js/dataTables.bootstrap.min.js"></script>

<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>问题列表</header>
                    <section>
                        <div class="container-fluid">
                          <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group" style="margin-bottom:20px;">
                                        <a class="btn btn-default" href="#question/add.html"><i class="fa fa-file-o"></i>添加问题</a>
                                    </div>
                                </div>
                          </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <div class="alert alert-success" role="alert">
                                        DataTables官网：<a target="_blank" href="https://www.datatables.net/">https://www.datatables.net/</a>
                                    </div> -->
                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>产品名称</th>
                                            <th>产品分类</th>
                                            <th>最后修改时间</th>
                                            <th>查看次数（前台）</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                      	
                                        <tbody>
                                        <?php /** @var Product $product */
                                        foreach ($productList as $product) {?>
                                        <tr>
                                            <td><?php echo $product->id?></td>
                                            <td><?php echo $product->title?></td>
                                            <td><?php $_cate = $product->cate;
                                                echo empty($_cate) ? '' : $_cate->name ?></td>
                                            <td><?php echo date('Y-m-d H:i:s',$product->mtime)?></td>
                                            <td><?php echo $product->views?></td>
                                          
                                            <td>
                                              <a href="#question/edit?id=<?php echo $product->id?>">编辑</a>
                                              <a href="#question/delete?id=<?php echo $product->id?>">删除</a>
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
            /*paging: false,
            lengthChange: false,
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