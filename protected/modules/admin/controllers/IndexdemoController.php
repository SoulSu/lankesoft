<?php

class IndexdemoController extends AdminBaseController
{

    public function actionList()
    {
        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(10, $pageSize);
        $criteria = new CDbCriteria();
        $criteria->order = '`sort` ASC';
        $count = Indexdemo::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $list = Indexdemo::model()->findAll($criteria);
        $this->render('list', array('indexDemoList' => $list, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $form = new IndexDemoForm();
        $attributes = array();

        if (request()->getIsPostRequest()) {
            $id = $this->request->getPost('id');
            $title = $this->request->getPost('title');
            $thumbnail = $this->request->getPost('thumbnail');
            $sort = $this->request->getPost('sort');
            $views = $this->request->getPost('views');

            $attributes = compact('id','title', 'sort', 'thumbnail', 'views');

            $form->setAttributes($attributes);
            if (!$form->validate()) {
                foreach ($form->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }
            // 添加到数据库中
            $model = Indexdemo::model();
            $model->setAttributes($attributes);

            // id 存在
            if (!empty($id) && Projectcase::model()->find('id=?', $id) !== null) {

                if (Indexdemo::model()->find('id=?', $id) === null){
                    $model->setAttribute('ctime', NOW);
                    $model->setIsNewRecord(true);
                }
                $model->setAttribute('id', $id);

                if (!$model->save()) {
                    foreach ($model->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }

            } else {
                throw new ValidateException('id错误, 不存在的信息');
            }

            $this->renderJson();
        } else {
            return $this->render('add', array('form' => $form, 'model' => Indexdemo::model()));
        }
}


public
function actionEdit()
{
    $form = new IndexDemoForm();
    $id = $this->request->getParam('id');
    $model = Indexdemo::model()->find('id = ?', $id);
    if ($model === null) {
        throw new CHttpException(404, '非法请求');
    }
    return $this->render('add', array('form' => $form, 'model' => $model));
}


public
function actionDelete()
{
    $id = $this->request->getParam('id');
    $model = Indexdemo::model()->find('id = ?', $id);
    if ($model === null) {
        throw new CHttpException(500, '产品不存在');
    }

    if (!$model->delete()) {
        throw new RuntimeException('删除失败');
    }

    return $this->renderJson();
}
}