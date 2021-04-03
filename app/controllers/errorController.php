<?php

class errorController {
    function __construct() {
        
    }

    function index() {
        $data = [
            'title' => 'Pagina no encontrada',
            'bg' => 'dark'
        ];
        View::render('404', $data);
    }
}