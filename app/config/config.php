<?php
    // Saber si estamos trabjando de forma local o remota
    define('IS_LOCAL'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

    // Definir el uso horario o timezone del sistema
    date_default_timezone_set('America/Mexico_City');

    // Leguaje
    define('LANG'       , 'es');

    // Ruta base de nuestros proyectos
    define('BASEPATH'   , IS_LOCAL ? '/Archivos/Escuela/Framework%20Bee/' : '___EL BASEPATH EN PRODUCCION___');

    // Sal del sistema
    define('AUTH_SALT'  , 'Framework');

    // Puerto y URL del sitio
    define('PORT'       , '80');
    define('URL'        , IS_LOCAL ? 'http://127.0.0.1:'.PORT.BASEPATH : '___URL EN PROUDCCION___');

    // Las rutas de directorios y archivos
    define('DS'         , DIRECTORY_SEPARATOR);
    define('ROOT'       , getcwd().DS);

    define('APP'        , ROOT.'app'.DS);
    define('CLASSES'    , APP.'classes'.DS);
    define('CONFIG'     , APP.'config'.DS);
    define('CONTROLLERS', APP.'controllers'.DS);
    define('FUNCTIONS'  , APP.'functions'.DS);
    define('MODELS'     , APP.'models'.DS);

    define('TEMPLATES'  , ROOT.'templates'.DS);
    define('INCLUDES'   , TEMPLATES.'includes'.DS);
    define('MODULES'    , TEMPLATES.'modules'.DS);
    define('VIEWS'      , TEMPLATES.'views'.DS);
    
    // Rutas de archivos o assets con base URL
    define('ASSETS'     , URL.'assets/');
    define('CSS'        , ASSETS.'css/');
    define('FAVICON'    , ASSETS.'favicon/');
    define('FONTS'      , ASSETS.'fonts/');
    define('IMAGES'     , ASSETS.'img/');
    define('JS'         , ASSETS.'js/');
    define('PLUGINS'    , ASSETS.'plugins/');
    define('UPLOADS'    , ASSETS.'uploads/');

    // Credenciales de la base de datos
    // Set para conexion local o de desarrollo
    define('LDB_ENGINE' , 'mysql');
    define('LDB_HOST'   , 'localhost');
    define('LDB_NAME'   , 'database');
    define('LDB_USER'   , 'root');
    define('LDB_PASS'   , '');
    define('LDB_CHARSET', 'utf8');

    // Set para conexion en produccion o servidor real
    define('DB_ENGINE'  , 'mysql');
    define('DB_HOST'    , 'localhost');
    define('DB_NAME'    , '___REMOTE DB___');
    define('DB_USER'    , '___REMOTE DB___');
    define('DB_PASS'    , '___REMOTE DB___');
    define('DB_CHARSET' , '___REMOTE CHARSET___');

    // El controlador por defecto / el metodo por defecto / y el controlador de errores por defecto
    define('DEFAULT_CONTROLLER'      , 'home');
    define('DEFAULT_ERROR_CONTROLLER', 'error');
    define('DEFAULT_METHOD'          , 'index');