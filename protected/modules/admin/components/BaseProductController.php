<?php

class BaseProductController extends AdminBaseController
{

    protected function _list($type)
    {

        $pageSize = (int)$this->request->getParam('pageSize');

        $pageSize = max(10, $pageSize);

        $criteria = new CDbCriteria();
        $criteria->order = '`id` ASC';
        $criteria->condition = '`type` = ?';
        $criteria->params = array($type);
        $count = Product::model()->count($criteria);

        $pager = new CPagination($count);
        $pager->pageSize = $pageSize;
        $pager->applyLimit($criteria);
        $productList = Product::model()->findAll($criteria);
        $this->render('list', array('productList' => $productList, 'pages' => $pager));
    }

    /**
     * @param CFormModel $form
     * @return string|void
     * @throws ValidateException
     */
    protected function _add($form, $type, $attributes, $id = null)
    {
        $productForm = clone $form;

        if (request()->getIsPostRequest()) {
            $productForm->setAttributes($attributes);
            if (!$productForm->validate()) {
                foreach ($productForm->getErrors() as $key => $error) {
                    throw new ValidateException(is_array($error) ? $error[0] : $error);
                }
            }
            // 添加到数据库中
            $productModel = Product::model();
            $productModel->setAttributes($attributes);

            // 修改
            if ($id !== null && Product::model()->getProductByIdAndType($id, $type) !== null) {
                $productModel->setAttribute('id', $id);
                if (!$productModel->update()) {
                    foreach ($productModel->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            } else {
                $productModel->setAttribute('ctime', isset($attributes['ctime']) ?
                    (is_string($attributes['ctime']) ? strtotime($attributes['ctime']) : $attributes['ctime'])
                    : NOW);
                $productModel->setIsNewRecord(true);
                if (!$productModel->save()) {
                    foreach ($productModel->getErrors() as $key => $error) {
                        throw new ValidateException(is_array($error) ? $error[0] : $error);
                    }
                }
            }


            $this->renderJson();
        } else {
            $this->_renderAdd($productForm, Product::model(), $type);
        }

    }

    protected function _edit($form, $type)
    {
        $productId = $this->request->getParam('id');
        $product = Product::model()->getProductByIdAndType($productId, $type);
        if ($product === null) {
            throw new CHttpException(404, '非法请求');
        }
        return $this->_renderAdd($form, $product, $type);

    }

    protected function _renderAdd($productForm, $productModel, $type)
    {
        $cateList = Cate::model()->getListByType($type);
        return $this->render('add', array('cates' => $cateList, 'form' => $productForm, 'model' => $productModel));
    }


    /**
     * 删除产品
     */
    protected function _delete($type)
    {
        $productId = $this->request->getParam('id');
        $product = Product::model()->getProductByIdAndType($productId, $type);
        if ($product === null) {
            throw new CHttpException(500, '产品不存在');
        }

        if (!$product->delete()) {
            throw new RuntimeException('删除失败');
        }

        return $this->renderJson();

    }

}