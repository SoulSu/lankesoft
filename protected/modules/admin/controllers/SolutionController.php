<?php

class SolutionController extends BaseProductController
{

    public function actionList()
    {
        $this->_list(Cate::BLACK_CATE_TYPE);
    }


    public function actionAdd()
    {
        $form = new SolutionForm();
        $attributes = array();
        $id = $this->request->getPost('id');
        if (request()->getIsPostRequest()) {
            $title = $this->request->getPost('title');
            $thumbnail = $this->request->getPost('thumbnail');
            $type = Cate::BLACK_CATE_TYPE;
            $ctime = $this->request->getPost('ctime');
            $content = $this->request->getPost('content');
            $keywords = $this->request->getPost('keywords');
            $describe = $this->request->getPost('describe');
            $sort = $this->request->getPost('sort');

            $attributes = compact('title', 'thumbnail', 'type', 'ctime',
                'content', 'keywords', 'describe', 'sort');
        }

        $this->_add($form, Cate::BLACK_CATE_TYPE, $attributes, $id);
    }


    public function actionEdit()
    {
        $this->_edit(new SolutionForm(), Cate::BLACK_CATE_TYPE);
    }

    public function actionDelete()
    {
        $this->_delete(Cate::BLACK_CATE_TYPE);
    }

}