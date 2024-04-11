<?php

namespace APP\controllers;
use APP\Database;
use eftec\bladeone\BladeOne;
class controller
{

    protected BladeOne|string $view = '';
    protected Database $db;
    public function __construct()
    {
        $views = __DIR__ . '/../../views';
        $cache = __DIR__ . '/../../cache';
        $this->view = new BladeOne($views,$cache,BladeOne::MODE_DEBUG);

        $this->db = new Database();
//        echo $blade->run("hello",array("variable1"=>"value1")); // it calls /views/hello.blade.php
    }
}