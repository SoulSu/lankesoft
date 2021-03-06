<?php

class LifeController extends AdminBaseController
{
    public function actionList()
    {
        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(10, $pageSize);
        $criteria = new CDbCriteria();
        $criteria->order = '`sort` ASC';
        $count = Life::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $list = Life::model()->findAll($criteria);
        $this->render('list', array('LifeList' => $list, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $form = new LifeForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $title = $this->request->getPost('title');
            $thumbnail = $this->request->getPost('thumbnail');
            $sort = $this->request->getPost('sort');

            $attributes = compact('title', 'sort', 'thumbnail');

            $form->setAttributes($attributes);
            if (!$form->validate()) {
                foreach ($form->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }
            // 添加到数据库中
            $model = Life::model();
            $model->setAttributes($attributes);

            // 修改
            if ($id !== null && Life::model()->find('id=?', $id) !== null) {
                $model->setAttribute('id', $id);
                if (!$model->update()) {
                    foreach ($model->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            } else {
                $model->setAttribute('ctime', NOW);
                $model->setIsNewRecord(true);
                if (!$model->save()) {
                    foreach ($model->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            }
            $this->renderJson();
        } else {
            return $this->render('add', array('form' => $form, 'model' => Life::model()));
        }
    }


    public function actionEdit()
    {
        $form = new LifeForm();
        $id = $this->request->getParam('id');
        $model = Life::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(404, '非法请求');
        }
        return $this->render('add', array('form' => $form, 'model' => $model));
    }


    public function actionDelete()
    {
        $id = $this->request->getParam('id');
        $model = Life::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(500, '产品不存在');
        }

        if (!$model->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();
    }

}