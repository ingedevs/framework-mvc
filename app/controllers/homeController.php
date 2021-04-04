<?php

class homeController extends Controller {
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