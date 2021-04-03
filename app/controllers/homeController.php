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

    function test() {
        $data = [
            'title' => 'Test'
        ];
        View::render('test', $data);
    }
}