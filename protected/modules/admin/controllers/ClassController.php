<?php

class ClassController extends AdminBaseController
{

    public function actionArticle()
    {
        $cate_id = $this->request->getParam('cate_id');

        if (!in_array($cate_id, array_keys(Cate::getAllCate()))) {
            throw new RuntimeException('分类不存在~');
        }

        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(5, $pageSize);

        $criteria = new CDbCriteria();
        $criteria->order = '`id` ASC';
        $criteria->condition = '`type` = ?';
        $criteria->params = array($cate_id);
        $count = Cate::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);

        $lists = Cate::model()->findAll($criteria);
        if ($lists === null) {
            $lists = array();
        }
        $this->render('article', array('cate_id' => $cate_id, 'lists' => $lists, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $cate_id = $this->request->getParam('cate_id');

        if (!in_array($cate_id, array_keys(Cate::getAllCate()))) {
            throw new RuntimeException('分类不存在~');
        }

        // post 请求
        if ($this->request->getIsPostRequest()) {
            $name = $this->request->getPost('name');
            $id = $this->request->getPost('id', null);
            if (is_null($name) || empty($name)) {
                throw new RuntimeException('分类名称未设置~');
            }

            $model = Cate::model();
            $model->name = $name;
            $model->type = $cate_id;


            if (!empty($id)) {
                $model->id = $id;
                if (!$model->update()) {
                    foreach ($model->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            } else {
                $model->ctime = NOW;
                $model->setIsNewRecord(true);
                if (!$model->save()) {
                    foreach ($model->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            }

            $this->renderJson();

        } else {

            $this->render('add', array('cate_id' => $cate_id, 'model' => Cate::model()));
        }
    }

    public function actionEdit()
    {
        $id = $this->request->getParam('id');
        $cate_id = $this->request->getParam('cate_id');

        $model = Cate::model()->find('id = ? AND `type` = ?', array($id, $cate_id));
        if ($model === null) {
            throw new RuntimeException('数据异常');
        }


        $this->render('add', array('cate_id' => $cate_id, 'model' => $model));
    }


    public function actionDelete()
    {
        $id = $this->request->getParam('id');
        $model = Cate::model()->find('`id` = ?', array($id));
        if ($model === null) {
            throw new CHttpException(500, '分类不存在~');
        }

        // 检查是否有被引用过
        if ($model->checkCateIsUsed($model->checkCateIsUsed($model->type))) {
            throw new CHttpException(500, '分类已经被引用，不能删除');
        }


        if (!$model->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();
    }

}