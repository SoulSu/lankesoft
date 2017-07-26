<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 2017/7/27 0027
 * Time: 0:00
 */
class PageController extends AdminBaseController
{

    public function actionDesktop()
    {
        $this->render('desktop');
    }
}