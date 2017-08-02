<?php

class ArticleController extends AdminBaseController
{

    public function actionList()
    {
        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(10, $pageSize);
        $criteria = new CDbCriteria();
        $criteria->order = '`sort` ASC';
        $count = Article::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $list = Article::model()->findAll($criteria);
        $this->render('list', array('ArticleList' => $list, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $form = new ArticleForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $title = $this->request->getPost('title');
            $cate_id = $this->request->getPost('cate_id');
            $releasetime = $this->request->getPost('releasetime');
            $author = $this->request->getPost('author');
            $describe = $this->request->getPost('describe');
            $thumbnail = $this->request->getPost('thumbnail');
            $content = $this->request->getPost('content');
            $sort = $this->request->getPost('sort');
            $ispass = $this->request->getPost('ispass');
            $views = $this->request->getPost('views');

            $attributes = compact(
                'title',
                'cate_id', 'releasetime',
                'author', 'describe',
                'thumbnail', 'content',
                'sort', 'ispass',
                'views'
            );

            $form->setAttributes($attributes);
            if (!$form->validate()) {
                foreach ($form->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }
            // 添加到数据库中
            $model = Article::model();
            $model->setAttributes($attributes);

            // 修改
            if ($id !== null && Article::model()->find('id=?', $id) !== null) {
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
            return $this->render('add', array('form' => $form, 'model' => Article::model()));
        }
    }


    public function actionEdit()
    {
        $form = new ArticleForm();
        $id = $this->request->getParam('id');
        $model = Article::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(404, '非法请求');
        }
        return $this->render('add', array('form' => $form, 'model' => $model));
    }


    public function actionDelete()
    {
        $id = $this->request->getParam('id');
        $model = Article::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(500, '产品不存在');
        }

        if (!$model->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();
    }
}