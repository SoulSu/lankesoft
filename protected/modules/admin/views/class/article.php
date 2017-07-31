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
                                        <a class="btn btn-default" href="#admin/class/add"><i class="fa
                                        fa-file-o"></i>添加分类</a>
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
                                            <tr>
                                                <td>1</td>
                                                <td>行业新闻</td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs">编辑</a>
                                                    <button class="btn btn-warning btn-xs J_confirm_modal" data-target="../server/ajaxReturn.json" data-tip="一定要删除？" type="button">删除</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>产品快讯</td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs">编辑</a>
                                                    <button class="btn btn-warning btn-xs J_confirm_modal" data-target="../server/ajaxReturn.json" data-tip="一定要删除？" type="button">删除</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>蓝科动态</td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs">编辑</a>
                                                    <button class="btn btn-warning btn-xs J_confirm_modal" data-target="../server/ajaxReturn.json" data-tip="一定要删除？" type="button">删除</button>
                                                </td>
                                            </tr>
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
    </div>

</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
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