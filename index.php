<?php

require_once __DIR__ . '/models/News.php';

$items = News::getAll();

//var_dump($items);
include_once __DIR__ . '/views/index.php';