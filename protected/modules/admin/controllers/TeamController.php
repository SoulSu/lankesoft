<?php

class TeamController extends AdminBaseController
{


    public function actionList()
    {
        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(5, $pageSize);
        $criteria = new CDbCriteria();
        $criteria->order = '`id` ASC';
        $count = Team::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $list = Team::model()->findAll($criteria);
        $this->render('list', array('TeamList' => $list, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $form = new TeamForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $name = $this->request->getPost('name');
            $titles = $this->request->getPost('titles');
            $position = $this->request->getPost('position');
            $phone = $this->request->getPost('phone');
            $describe = $this->request->getPost('describe');
            $sort = $this->request->getPost('sort');

            $attributes = compact(
                'name', 'titles',
                'position', 'phone',
                'describe', 'sort'
            );

            $form->setAttributes($attributes);
            if (!$form->validate()) {
                foreach ($form->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }
            // 添加到数据库中
            $model = Team::model();
            $model->setAttributes($attributes);

            // 修改
            if (!empty($id) && Team::model()->find('id=?', $id) !== null) {
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
            return $this->render('add', array('form' => $form, 'model' => Team::model()));
        }
    }


    public function actionEdit()
    {
        $form = new TeamForm();
        $id = $this->request->getParam('id');
        $model = Team::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(404, '非法请求');
        }
        return $this->render('add', array('form' => $form, 'model' => $model));
    }


    public function actionDelete()
    {
        $id = $this->request->getParam('id');
        $model = Team::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(500, '产品不存在');
        }

        if (!$model->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();
    }


}