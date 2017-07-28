<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>工作台</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/public/css/vendor/bootstrap/dist/bootstrap.css">
    <link rel="stylesheet" href="/public/css/vendor/Animate.css">
    <link rel="stylesheet" href="/public/css/basic.css">
    <link rel="stylesheet" href="/public/css/vendor/font_awesome/css/font-awesome.css">
    <!--[if lt IE 9]>
    <script src="/public/js/vendor/html5shiv.min.js"></script>
    <script src="/public/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <form class="form-signin" method="post" action="./login">
        <div class="logo animated bounceIn"><img src="/logo.png"/></div>
        <h3>欢迎使用揽客</h3>
        <?php echo CHtml::errorSummary($model); ?>
        <div class="form-group">
            <!--[if lte IE 9]><label>用户名</label><![endif]-->
            <input type="text" class="form-control" placeholder="用户名" required="required" autofocus="autofocus"
                   name="username">
        </div>
        <div class="form-group">
            <!--[if lte IE 9]><label>密码</label><![endif]-->
            <input type="password" class="form-control" placeholder="密码" required="required" name="password">
        </div>
        <div class="form-group" style="position:relative;">
            <!--[if lte IE 9]><label>验证码</label><![endif]-->
            <!--[if lte IE 9]>
            <style type="text/css">.J_verify_code {
                top: 33px !important;
            }</style><![endif]-->
            <input type="text" class="form-control" placeholder="验证码" required="required" name="verificationCode">
            <div class="J_verify_code" style="cursor:pointer;position:absolute;top:8px;right:6px;">
                <?php $this->widget('CCaptcha',
                    array('showRefreshButton' => false, 'clickableImage' => true, 'imageOptions' => array('style'=>'height:46px;margin: -5px -30px 0 0;'))
                );
                ?>
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block subBtn" type="submit">登录</button>
        <div class="help"><i class="fa fa-lightbulb-o"></i></div>
        <div class="copyright"><i class="fa fa-copyright"></i></div>
    </form>
</div>


<script src="/public/js/vendor/jquery.min.js"></script>
<script src="/public/js/vendor/bootstrap/dist/bootstrap.js"></script>
<script src="/public/js/vendor/ie10-viewport-bug-workaround.js"></script>
</body>
</html>