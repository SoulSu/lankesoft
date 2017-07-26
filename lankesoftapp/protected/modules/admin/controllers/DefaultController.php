<?php

class DefaultController extends AdminBaseController
{
    

    public function actionIndex()
    {
        $this->render('index');
    }


    public function actionLogin()
    {
        $this->render('login');
    }


    public function actionNav()
    {
//        var_dump(YiiBase::app()->params);
//        YiiBase::app()->request->set
//            $this->renderText()
        echo Yii::app()->params['adminConfig']['webnav'];
    }

}