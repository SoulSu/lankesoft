<?php

class ProfiledownloadController extends AdminBaseController
{
    public function actionList()
    {
        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(10, $pageSize);
        $criteria = new CDbCriteria();
        $criteria->order = '`sort` ASC';
        $count = Profiledownload::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $list = Profiledownload::model()->findAll($criteria);
        $this->render('list', array('ProfiledownloadList' => $list, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $form = new ProfiledownloadForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $title = $this->request->getPost('title');
            $cate_id = $this->request->getPost('category');
            $sort = $this->request->getPost('sort');
            $filesize = $this->request->getPost('filesize');
            $fileproperty = $this->request->getPost('fileproperty');
            $describe = $this->request->getPost('describe');
            $content = $this->request->getPost('content');
//            $attach = $this->request->getPost('file');
            $thumbnail = $this->request->getPost('thumbnail','-');
            $downloadnums = $this->request->getPost('downloadnums');
            $publish_time = $this->request->getPost('publish_time');

            $attributes = compact(
                'title', 'cate_id',
                'sort', 'filesize',
                'fileproperty', 'describe',
                'content',
                'thumbnail', 'downloadnums',
                'publish_time'
            );

            $form->setAttributes($attributes);
            if (!$form->validate()) {
                foreach ($form->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }

            // 文件上传信息
            $attach = uploadFile('file', 'profile');


            // 添加到数据库中
            $model = Profiledownload::model();
            $model->setAttributes($attributes);
            $model->setAttribute('attach', $attach['url']);

            // 修改
            if (!empty($id) && Profiledownload::model()->find('id=?', $id) !== null) {
                $model->setAttribute('id', $id);
                if (!$model->update()) {
                    foreach ($model->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            } else {
                $model->setAttribute('ctime', NOW);
                $model->setAttribute('publish_time', strtotime($publish_time));
                $model->setIsNewRecord(true);
                if (!$model->save()) {
                    foreach ($model->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            }
            $this->renderJson();
        } else {
            $cateList = Cate::model()->getListByType(Cate::PROFILEDOWNLOAD_CATE_TYPE);
            return $this->render('add', array('form' => $form, 'model' => Profiledownload::model(), 'cates' => $cateList));
        }
    }


    public function actionEdit()
    {
        $form = new ProfiledownloadForm();
        $id = $this->request->getParam('id');
        $model = Profiledownload::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(404, '非法请求');
        }
        $cateList = Cate::model()->getListByType(Cate::PROFILEDOWNLOAD_CATE_TYPE);
        return $this->render('add', array('form' => $form, 'model' => $model, 'cates' => $cateList));
    }


    public function actionDelete()
    {
        $id = $this->request->getParam('id');
        $model = Profiledownload::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(500, '产品不存在');
        }

        if (!$model->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();
    }

}