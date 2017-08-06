<?php

class ProjectcaseController extends AdminBaseController
{

    public function actionList()
    {
        $pageSize = (int)$this->request->getParam('pageSize');
        $pageSize = max(10, $pageSize);
        $criteria = new CDbCriteria();
        $criteria->order = '`id` ASC';
        $count = Projectcase::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $productList = Projectcase::model()->findAll($criteria);
        $this->render('list', array('productCaseList' => $productList, 'pages' => $pager));
    }

    public function actionAdd()
    {
        $form = new ProjectcaseForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $title = $this->request->getPost('title');
            $provice_code = $this->request->getPost('provice_code');
            $city_code = $this->request->getPost('city_code');
            $area_code = $this->request->getPost('area_code');
            $cate_id = $this->request->getPost('category');
            $bid_time = $this->request->getPost('bid_time');
            $scale = $this->request->getPost('scale');
            $address = $this->request->getPost('address');
            $overview = $this->request->getPost('overview');
            $situation = $this->request->getPost('situation');
            $completion = $this->request->getPost('completion');
            $sort = $this->request->getPost('sort');
            $thumbnail = $this->request->getPost('thumbnail');
            $views = $this->request->getPost('views');

            $attributes = compact('title', 'provice_code', 'city_code', 'area_code', 'bid_time', 'cate_id',
                'scale', 'address', 'overview', 'situation', 'completion', 'sort', 'thumbnail', 'views');

            $form->setAttributes($attributes);
            if (!$form->validate()) {
                foreach ($form->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }
            // 添加到数据库中
            $productModel = Projectcase::model();
            $productModel->setAttributes($attributes);

            // 修改
            if (!empty($id) && Projectcase::model()->find('id=?', $id) !== null) {
                $productModel->setAttribute('id', $id);
                if (!$productModel->update()) {
                    foreach ($productModel->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            } else {
                $productModel->setAttribute('ctime', NOW);
                $productModel->setIsNewRecord(true);
                if (!$productModel->save()) {
                    foreach ($productModel->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            }
            $this->renderJson();
        } else {
            $cateList = Cate::model()->getListByType(Cate::PROJECT_CASE_CATE_TYPE);
            return $this->render('add', array('cates' => $cateList, 'form' => $form, 'model' => Product::model()));
        }
    }

    /**
     * 编辑产品
     */
    public function actionEdit()
    {
        $form = new ProductForm();
        $id = $this->request->getParam('id');
        $product = Projectcase::model()->find('id = ?', $id);
        if ($product === null) {
            throw new CHttpException(404, '非法请求');
        }
        $cateList = Cate::model()->getListByType(Cate::PROJECT_CASE_CATE_TYPE);
        return $this->render('add', array('cates' => $cateList, 'form' => $form, 'model' => $product));
    }


    /**
     * 删除产品
     */
    public function actionDelete()
    {
        $id = $this->request->getParam('id');
        $product = Projectcase::model()->find('id = ?', $id);
        if ($product === null) {
            throw new CHttpException(500, '产品不存在');
        }

        if (!$product->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();
    }


}