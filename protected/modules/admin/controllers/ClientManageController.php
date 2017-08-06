<?php

// Customer
class ClientManageController extends AdminBaseController
{

    public function actionList()
    {
        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(5, $pageSize);
        $criteria = new CDbCriteria();
        $criteria->order = '`sort` ASC';
        $count = Customer::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $list = Customer::model()->findAll($criteria);
        $this->render('list', array('CustomerList' => $list, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $form = new CustomerForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $name = $this->request->getPost('name');
            $contacter = $this->request->getPost('contacter');
            $phone = $this->request->getPost('phone');
            $fax = $this->request->getPost('fax');
            $address = $this->request->getPost('address');
            $zip_code = $this->request->getPost('zip_code');
            $site = $this->request->getPost('site');
            $cate_id = $this->request->getPost('category');
            $sort = $this->request->getPost('sort');
            $content = $this->request->getPost('content');

            $attributes = compact(
                'name',
                'contacter', 'phone',
                'fax', 'address',
                'zip_code', 'site',
                'cate_id', 'sort',
                'content'
            );

            $form->setAttributes($attributes);
            if (!$form->validate()) {
                foreach ($form->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }
            // 添加到数据库中
            $model = Customer::model();
            $model->setAttributes($attributes);

            // 修改
            if (!empty($id) && Customer::model()->find('id=?', $id) !== null) {
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
            return $this->render('add', array(
                'form' => $form, 'model' => Customer::model(),
                'cates'=>Cate::model()->getListByType(Cate::CUSTOMER_CATE_TYPE),
            ));
        }
    }


    public function actionEdit()
    {
        $form = new CustomerForm();
        $id = $this->request->getParam('id');
        $model = Customer::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(404, '非法请求');
        }
        return $this->render('add', array(
            'form' => $form, 'model' => $model,
            'cates'=>Cate::model()->getListByType(Cate::CUSTOMER_CATE_TYPE),
        ));
    }


    public function actionDelete()
    {
        $id = $this->request->getParam('id');
        $model = Customer::model()->find('id = ?', $id);
        if ($model === null) {
            throw new CHttpException(500, '产品不存在');
        }

        if (!$model->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();
    }


}