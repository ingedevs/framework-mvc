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

    function flash() {
        unset($_SESSION);
        flasher::new('A simple primary alert'  , 'primary');
        flasher::new('A simple secondary alert', 'secondary');
        flasher::new('A simple success alert'  , 'success');
        flasher::new('A simple danger alert'   , 'danger');
        flasher::new('A simple warning alert'  , 'warning');
        flasher::new('A simple info alert'     , 'info');
        flasher::new('A simple light alert'    , 'light');
        flasher::new('A simple dark alert'     , 'dark');

        View::render('flash');
    }
}