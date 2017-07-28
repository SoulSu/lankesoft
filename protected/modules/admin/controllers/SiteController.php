<?php

class SiteController extends AdminBaseController
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }


    /**
     * 后台首页
     */
    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * 登录页面
     */
    public function actionLogin()
    {
        $adminForm = new AdminForm();

        if ($this->request->getIsPostRequest()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $verificationCode = $this->request->getPost('verificationCode');

            $adminForm->setAttributes(compact('username', 'password', 'verificationCode'));

            if (!$adminForm->validate()) {
                yiilog(compact('username', 'verificationCode') + array('login err'));
                return $this->render('login', array('model' => $adminForm));
            }

            $identity = new AdminIdentity($username, $password);
            if (!$identity->authenticate()) {
                $adminForm->addError('username', '用户名或密码错误');
                return $this->render('login', array('model' => $adminForm));
            }
            // 写入登录信息
            Yii::app()->user->login($identity);

            // 更新登录记录
            $oldAdmin = Admin::model()->findByPk(user()->getId());
            if ($oldAdmin->save()) {
                yiilog(array('updateerr' => $oldAdmin->getErrors()));
            }

            return $this->redirect('/admin');

        } else {
            return $this->render('login', array('model' => $adminForm));
        }
    }

    /**
     * 登出
     */
    public function actionLogout()
    {
        user()->logout(true);
        $ret = array(
            'referer' => $this->createUrl('/admin/login'),
            'refresh' => false,
            'state' => 'success',
            'message' => '提交成功',
        );
        return $this->renderText(json_encode($ret));
    }

    /**
     * 左侧导航
     */
    public function actionNav()
    {
        echo Yii::app()->params['adminConfig']['webnav'];
    }
}