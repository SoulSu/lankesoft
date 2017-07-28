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
                                        <div class="body">您好：<?php echo user()->getName();?>！您上一次登录时间：<?php echo date('Y-m-d H:i:s',user()->getState('admin')->mtime)?>，登录IP：<?php echo user()->getState('admin')->last_login_ip;?></div>
                                    </div>
                                    <div class="my_panel">
                                        <div class="heading">系统信息</div>
                                        <div class="body">
                                            <table class="table table-striped">
                                                <tbody>
                                                <tr>
                                                    <td width="200">软件版本</td>
                                                    <td><?php echo SOFT_VERSION;?></td>
                                                </tr>
                                                <tr>
                                                    <td>操作系统</td>
                                                    <td><?php echo PHP_OS;?></td>
                                                </tr>
                                                <tr>
                                                    <td>PHP版本</td>
                                                    <td><?php echo phpversion();?></td>
                                                </tr>
                                                <tr>
                                                    <td>MYSQL版本</td>
                                                    <td><?php echo YiiBase::app()->getDb()->getServerVersion();?></td>
                                                </tr>
                                                <tr>
                                                    <td>服务器端信息</td>
                                                    <td><?php echo isset($_SERVER["SERVER_SOFTWARE"]) ?
                                                            $_SERVER["SERVER_SOFTWARE"] : "unknow";?></td>
                                                </tr>
                                                <tr>
                                                    <td>最大上传限制</td>
                                                    <td><?php echo ini_get('post_max_size');?></td>
                                                </tr>
                                                <tr>
                                                    <td>最大执行时间</td>
                                                    <td><?php echo ini_get('max_execution_time');?>s</td>
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