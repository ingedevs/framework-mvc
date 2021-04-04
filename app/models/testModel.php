<?php

class testModel extends Model {
    public $id;
    public $name;
    public $username;
    public $email;
    public $created_at;
    public $updated_at;

    /**
     * Metodo para agregar un usuario
     * @return integer
     */
    public function add() {
        $sql = 'INSERT INTO tests (name, username, email, created_at) VALUES (:name, :username, :email, :created_at)';
        $registro = [
            'name'       => $this->name,
            'username'   => $this->username,
            'email'      => $this->email,
            'created_at' => $this->created_at
        ];

        try {
            return ($this->id = parent::query($sql, $registro)) ? $this->id : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update() {
        $sql = 'UPDATE tests SET name=:name, username=:username, email=:email WHERE id=:id';
        $registro = [
            'id'         => $this->id,
            'name'       => $this->name,
            'username'   => $this->username,
            'email'      => $this->email
        ];

        try {
            return ($this->id = parent::query($sql, $registro)) ? $this->id : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

}