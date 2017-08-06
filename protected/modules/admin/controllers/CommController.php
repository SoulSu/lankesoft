<?php

/**
 * 工具类
 * Class CommController
 */
class CommController extends AdminBaseController
{
    public function actionArea()
    {
        $this->jsonData->setData(Utils::getArea());
        return $this->renderJson();
    }

    public function actionProvice()
    {
        $this->jsonData->setData(Utils::getProvice());
        return $this->renderJson();
    }

    public function actionCity()
    {
        $proviceId = $this->request->getParam('proviceId');
        $this->jsonData->setData(Utils::getCity($proviceId));
        return $this->renderJson();
    }
}