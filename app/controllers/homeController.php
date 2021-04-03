<?php

class homeController {
    function __construct() {
        
    }

    function index() {
        //echo 'Bienvenido';
        $data = [
            'title' => 'Bienvenido',
            'bg' => 'dark'
        ];
        View::render('main', $data);
    }
}