<link rel="stylesheet" href="../public/js/vendor/DataTables/css/dataTables.bootstrap.css">
<script src="../public/js/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../public/js/vendor/DataTables/js/dataTables.bootstrap.min.js"></script>

<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>蓝科生活相册</header>
                    <section>
                        <div class="container-fluid">
                          <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group" style="margin-bottom:20px;">
                                        <a class="btn btn-default" href="#life/add.html"><i class="fa fa-file-o"></i>添加相片</a>
                                    </div>
                                </div>
                          </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>标题</th>
                                            <th>缩略图</th>
                                            <th>显示顺序</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                      	
                                        <tbody>
                                        <?php
                                        /** @var Life $list */
                                        foreach ($LifeList as $list){
                                        ?>
                                        ?>
                                        <tr>
                                            <td><?php echo $list->id?></td>
                                            <td><?php echo $list->title?></td>
                                            <td>
                                                <img src="<?php echo $list->thumbnail?>" alt="">
                                            </td>                                   
                                            <td><?php echo $list->sort?></td>
                                            <td>
                                              <a href="#life/edit.html?id=<?php echo $list->id;?>">编辑</a>
                                              <a href="#life/delete.html?id=<?php echo $list->id;?>">删除</a>
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