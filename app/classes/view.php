<?php

class View {
    public static function render($view, $data=[]) {
        // Convertir el array asiciativo en objeto
        $d = to_object($data); // $data en array assoc o $d en objetos

        if(!is_file(VIEWS.CONTROLLER.DS.$view.'View.php')) {
            die(sprintf('<br>No existe la vista %sView en el %s', $view, CONTROLLER));
        } else {
            require_once VIEWS.CONTROLLER.DS.$view.'View.php';
            exit();
        }
    }
}