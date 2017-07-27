<?php

class ClassController extends AdminBaseController
{

    public function actionArticle()
    {
        $this->render('article');
    }

    public function actionAdd()
    {
        $this->render('add');
    }

}