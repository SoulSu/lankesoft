<?php

class ClassController extends AdminBaseController
{

    public function actionArticle()
    {
        $cate_id = $this->request->getParam('cate_id');

        if (!in_array($cate_id, array_keys(Cate::getAllCate()))) {
            throw new RuntimeException('分类不存在~');
        }

        $lists = Cate::model()->findAll('`type` = ?', array($cate_id));
        if ($lists === null) {
            $lists = array();
        }
        $this->render('article', array('cate_id' => $cate_id, 'lists' => $lists));
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

}