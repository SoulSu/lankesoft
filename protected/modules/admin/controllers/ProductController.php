<?php

class ProductController extends BaseProductController
{


    public function actionList()
    {
        $this->_list(Cate::PRODUCT_CATE_TYPE);
    }

    /**
     * 添加产品
     * @return string
     */
    public function actionAdd()
    {
        $form = new ProductForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $title = $this->request->getPost('title');
            $cate_id = $this->request->getPost('category');
            $type = Cate::PRODUCT_CATE_TYPE;
            $ctime = $this->request->getPost('ctime');
            $content = $this->request->getPost('content');
            $keywords = $this->request->getPost('keywords');
            $describe = $this->request->getPost('describe');
            $sort = $this->request->getPost('sort');
            $views = $this->request->getPost('views');

            $attributes = compact('title', 'cate_id', 'type', 'ctime',
                'content', 'keywords', 'describe', 'sort', 'views');
        }

        $this->_add($form, Cate::PRODUCT_CATE_TYPE, $attributes, $id);

    }

    /**
     * 编辑产品
     */
    public function actionEdit()
    {
        $productForm = new ProductForm();
        $this->_edit($productForm, Cate::PRODUCT_CATE_TYPE);
    }


    /**
     * 删除产品
     */
    public function actionDelete()
    {
        $this->_delete(Cate::PRODUCT_CATE_TYPE);
    }
}