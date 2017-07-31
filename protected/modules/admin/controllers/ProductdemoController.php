<?php

class ProductdemoController extends BaseProductController
{

    public function actionList()
    {
        $this->_list(Cate::PRODUCT_DEMO_CATE_TYPE);
    }

    /**
     * 添加产品
     * @return string
     */
    public function actionAdd()
    {
        $form = new ProductDemoForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $id = $this->request->getPost('id');
            $title = $this->request->getPost('title');
            $cate_id = $this->request->getPost('category');
            $type = Cate::PRODUCT_DEMO_CATE_TYPE;
            $thumbnail = $this->request->getPost('thumbnail');
            $content = $this->request->getPost('content');
            $describe = $this->request->getPost('describe');
            $sort = $this->request->getPost('sort');

            $attributes = compact('title', 'cate_id', 'type', 'thumbnail',
                'content', 'keywords', 'describe', 'sort', 'views');
        }

        $this->_add($form, Cate::PRODUCT_DEMO_CATE_TYPE, $attributes, $id);
    }

    /**
     * 编辑产品
     */
    public function actionEdit()
    {
        $productForm = new ProductDemoForm();
        $this->_edit($productForm,Cate::PRODUCT_DEMO_CATE_TYPE);
    }



    /**
     * 删除产品
     */
    public function actionDelete()
    {
        $this->_delete(Cate::PRODUCT_DEMO_CATE_TYPE);
    }

}