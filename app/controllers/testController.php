<?php

class testController extends Controller {
    function __construct() {
        
    }

    function index() {
        View::render('test');
    }

    function csrf() {
        print_r($_SESSION);
        
        $token_peticion = '9f0f5fb7753b0712e10b45100d8f95cde8f2d946ad1a9c100a68739155ade4b3';
        if(Csrf::validate($token_peticion)) {
            echo 'valido';
        } else {
            die('cuidado, token no valido e inseguro');
        }
    }

    function models() {
        try {
            $user = new testModel();
            $user->id = 4;
            $user->name = 'NAME';
            $user->username = 'USERNAME';
            $user->email = 'EMAIL';
            $user->created_at = now();
            //$user->add();
            //$user->update();
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    function database() {
        echo 'Probando la base de datos<br><br><br>';
        echo '<pre>';
        try {
            // SELECT
            $sql = 'SELECT * FROM tests WHERE id=:id';
            $res = Database::query($sql, ['id' => 1]);
            print_r($res);

            // INSERT
            $sql = 'INSERT INTO tests (name, email, created_at) VALUES (:name, :email, :created_at)';
            $registro = [
                'name' => 'name4',
                'email' => 'email4',
                'created_at' => now()
            ];
            //Database::query($sql, $registro);

            // UPDATE
            $sql = 'UPDATE tests SET name=:name WHERE id=:id';
            $registro_actualizado = [
                'name' => 'Nombre',
                'id' => 3
            ];
            //Database::query($sql,$registro_actualizado);

            // DELETE
            $sql = 'DELETE FROM tests WHERE id=:id LIMIT 1';
            //Database::query($sql, ['id' => 3]);
            
            // ALTER TABLE 
            $sql = 'ALTER TABLE tests ADD COLUMN username VARCHAR(255) NULL AFTER name';
            //Database::query($sql);

        } catch (Exception $e) {
            echo 'Hubo un error | '.$e->getMessage();
        }

        echo '</pre>';
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