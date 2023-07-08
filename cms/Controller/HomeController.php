<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        $data = ['name'=> 'Ilya'];
        $this->view->render('index', $data);
    }

    public function news($id)
    {
        echo 'News Page = ' . $id;
    }
}