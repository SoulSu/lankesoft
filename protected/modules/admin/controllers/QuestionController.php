<?php

class QuestionController extends BaseProductController
{


    public function actionList()
    {
        $this->_list(Cate::QUESTION_CATE_TYPE);
    }


    public function actionAdd()
    {
        $form = new QuestionForm();
        $attributes = array();
        $id = $this->request->getPost('id');

        if (request()->getIsPostRequest()) {
            $title = $this->request->getPost('title');
            $cate_id = $this->request->getPost('category');
            $type = Cate::QUESTION_CATE_TYPE;
            $content = $this->request->getPost('content');
            $sort = $this->request->getPost('sort');
            $attributes = compact('title', 'cate_id', 'type', 'content', 'sort');
        }

        $this->_add($form, Cate::QUESTION_CATE_TYPE, $attributes, $id);
    }


    public function actionEdit()
    {
        $this->_edit(new QuestionForm(), Cate::QUESTION_CATE_TYPE);
    }

    public function actionDelete()
    {
        $this->_delete(Cate::QUESTION_CATE_TYPE);
    }
}