<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>工作台</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
<!--                                    <div class="alert alert-success" role="alert">-->
<!--                                        本演示中有关文件上传的操作，必须clone到本地并配置php环境才能运行。-->
<!--                                    </div>-->
                                    <div class="my_panel">
                                        <div class="heading">欢迎信息</div>
                                        <div class="body">您好：admin！您上一次登录时间：2016-09-29 13:07，登录IP：127.0.0.1</div>
                                    </div>
                                    <div class="my_panel">
                                        <div class="heading">系统信息</div>
                                        <div class="body">
                                            <table class="table table-striped">
                                                <tbody>
                                                <tr>
                                                    <td width="200">软件版本</td>
                                                    <td>v1</td>
                                                </tr>
                                                <tr>
                                                    <td>操作系统</td>
                                                    <td><?php echo "Linux"?></td>
                                                </tr>
                                                <tr>
                                                    <td>PHP版本</td>
                                                    <td><?php echo phpversion();?></td>
                                                </tr>
                                                <tr>
                                                    <td>MYSQL版本</td>
                                                    <td>5.6.12-log</td>
                                                </tr>
                                                <tr>
                                                    <td>服务器端信息</td>
                                                    <td>Apache/2.4.4 (Win32)</td>
                                                </tr>
                                                <tr>
                                                    <td>最大上传限制</td>
                                                    <td><?php echo ini_get('post_max_size');?></td>
                                                </tr>
                                                <tr>
                                                    <td>最大执行时间</td>
                                                    <td><?php echo ini_get('max_execution_time');?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
<!--                                    -->
<!--                                    <div class="my_panel">-->
<!--                                        <div class="heading">开发团队</div>-->
<!--                                        <div class="body">-->
<!--                                            <table class="table table-striped">-->
<!--                                                <tbody>-->
<!--                                                <tr>-->
<!--                                                    <td width="200">创建者</td>-->
<!--                                                    <td>liyu</td>-->
<!--                                                </tr>-->
<!--                                                </tbody>-->
<!--                                            </table>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>

</div>