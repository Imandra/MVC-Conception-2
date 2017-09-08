<?php

//require_once __DIR__ . '/../models/News.php';

class NewsController
{
    public function actionAll ()
    {
        $items = NewsModel::findAll();
        $view = new View();
        $view->items = $items;//создаем свойство items для объекта $view в рантайме - метод __set() в классе View
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

}