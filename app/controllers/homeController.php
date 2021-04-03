<?php

class homeController {
    function __construct() {
        
    }

    function index() {
        $data = [
            'title' => 'Bienvenido',
            'bg' => 'dark'
        ];
        View::render('main', $data);
    }
}