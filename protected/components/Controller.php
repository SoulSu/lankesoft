<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();


    /**
     * @var JsonResponse
     */
    public $jsonData;

    /**
     * @var CHttpRequest
     */
    public $request = null;


    public function init()
    {
        parent::init();
        header("Content-Type:text/html; charset=UTF-8");

        $this->request=YiiBase::app()->getRequest();

        $this->jsonData = new JsonResponse();
        $this->jsonData->setCode(0);

        /*
        Yii::log(Yii::app()->request->getPathInfo(), CLogger::LEVEL_INFO, Yii::app()->request->getPathInfo());
        var_dump(Yii::app()->request->getPathInfo());
        var_dump(Yii::app()->request->getHostInfo('http'));
        */
    }


    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,  //背景颜色
                'minLength' => 4,  //最短为4位
                'maxLength' => 4,   //是长为4位
                'transparent' => true,  //显示为透明
            ),
        );
    }

    public function renderJson()
    {
        echo $this->jsonData;
    }
}

