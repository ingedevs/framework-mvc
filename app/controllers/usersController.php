<?php

class usersController {
    function __construct() {
        echo 'Ejecutando: '.__CLASS__;
    }
    
    function index() {

    }

    function ver($id = null, $usuario = null) {
        echo 'ver';
        echo sprintf('<br>viendo el peril del usuario %s con id %s en la clase %s',$usuario, $id, __CLASS__);
    }

    function agregar() {
        echo 'agregar';
    }

    function actualizar() {
        echo 'actualizar';
    }

    function borrar() {
        echo 'borrar';
    }

}