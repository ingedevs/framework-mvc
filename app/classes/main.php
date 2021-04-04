<?php

class Main {

    // Propiedades del framework
    private $framework = 'Framework';
    private $version = '1.0.0';
    private $uri = [];

    // Funcion principal que se ejecuta al instancia nuestra clase
    function __construct() {
        $this->init();
    }

    /**
     * Metodo para ejecutar cada metodo de forma subsecuente
     * @return void
     */
    private function init() {
        // Todos los metodos que queremos ejecutar consecutivamente
        $this->init_session();
        $this->init_load_config();
        $this->init_load_functions();
        $this->init_autoload();
        $this->init_csrf();
        $this->dispatch();
    }

    /** 
     * Metodo para inciar la sesion en el sistema
     * @return void
     */
    private function init_session() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return;
    }

    /**
     * Metodo para cargar la configuracion del sistema
     * @return void
     */
    private function init_load_config() {
        // Validando que el archivo de configuiracion exista
        $file = 'config.php';
        if(!is_file('app/config/'.$file)) {
            die(sprintf('El archivo %s no se cuentra, es requerido para que %s funcione', $file, $this->$framework));
        }

        // Cargando archivo de configuracion
        require_once 'app/config/'.$file;

        return;
    }

    /**
     * Metodo para cargar todas la funciones del sistema y del usuario
     * @return void
     */
    private function init_load_functions() {
        // Validando que el archivo de funciones core exista
        $file = 'core.php';
        if(!is_file(FUNCTIONS.$file)) {
            die(sprintf('El archivo %s no se cuentra, es requerido para que %s funcione', $file, $this->$framework));
        }

        // Cargando archivo de funciones core
        require_once FUNCTIONS.$file;

        // Validando que el archivo de funciones custom exista
        $file = 'custom.php';
        if(!is_file(FUNCTIONS.$file)) {
            die(sprintf('El archivo %s no se cuentra, es requerido para que %s funcione', $file, $this->$framework));
        }

        // Cargando archivo de funciones custom
        require_once FUNCTIONS.$file;

        return;
    }

    /**
     * Metodo para cargar todos los archivos de forma automatica
     * @return void
     */
    private function init_autoload() {
        require_once CLASSES.'autoloader.php';
        Autoloader::init();
        return;
    }

    /**
     * Metodo para crear un nuevo token de la sesion del usuario
     * @return void
     */
    private function init_csrf() {
        $csrf = new Csrf();
    }

    /**
     * Metodo para filtrar y descomponer la uri
     * @return void
     */ 
    private function filter_url() {
        if(isset($_GET['uri'])) {
            $this->uri = $_GET['uri'];
            $this->uri = rtrim($this->uri, '/');
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode('/', strtolower($this->uri));
            return $this->uri;
        }
    }

    /**
     * Metodo para ejecutar y cargar de forma automatica el controlador solicitado por el usuario
     * su metodo y pasar parametros a el
     * @return void
     */
    private function dispatch() {
        // filtrar la URI y separar la URI
        $this->filter_url();

        ///////////////////////////////////////////////////////////////////////////////////////////////
        // Necesitamos saber si se esta pasando el nombre de un controlador en nuestro URI
        // $this->uri[0] es el controlador en cuestion
        if(isset($this->uri[0])) {
            $current_controller = $this->uri[0];
            unset($this->uri[0]);
        } else {
            $current_controller = DEFAULT_CONTROLLER; // homeController
        }

        // Ejecucion del controlador
        // Verificamos si existe una clase con el controlador solicitado
        $controller = $current_controller.'Controller';
        if(!class_exists($controller)) {
            $controller = DEFAULT_ERROR_CONTROLLER.'Controller'; // errorController
            $current_controller = DEFAULT_ERROR_CONTROLLER; // para que CONTROLLER sea error
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////
        // Ejecucion del metodo solicitado
        if(isset($this->uri[1])) {
            $method = str_replace('-', '_', $this->uri[1]);
            // Validar si existe el metodo de la clase a ejecutar (controlador)
            if(!method_exists($controller, $method)) {
                $controller = DEFAULT_ERROR_CONTROLLER.'Controller'; // errorController
                $current_method = DEFAULT_METHOD; // index
                $current_controller = DEFAULT_ERROR_CONTROLLER;
            } else {
                $current_method = $method;
            }
            unset($this->uri[1]);
        } else {
            $current_method = DEFAULT_METHOD; // index
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////
        // Creando constantes para utilizar mas adelante
        define('CONTROLLER', $current_controller);
        define('METHOD'    , $current_method);
        define('', '');

        ///////////////////////////////////////////////////////////////////////////////////////////////
        // Ejecutando  controlador y metodo segun se haga la peticion
        $controller = new $controller;
        // Obteniendo los parametros de la URI
        $params = array_values(empty($this->uri) ? [] : $this->uri);
        // Llamada al metodo que solicita el usuario
        if(empty($params)) {
            call_user_func([$controller, $current_method]);
        } else {
            call_user_func_array([$controller, $current_method], $params);
        }   
        return;
    }

    /**
     * Correr nuestro framework
     * @return void
     */
    public static function start() {
        $main = new self();
        return;
    }

}