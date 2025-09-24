<?php

// DB imported on index.php
require_once __DIR__ . '/db.php';

class Users {

    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $password;
    public $token;
    public $expired;
    public $is_admin;

    // Get all users from the database
    public static function getAll(){
    //static → no necesitás crear un objeto (new User()) para usarlo; se llama directamente con User::getAll().

        $db = DB::getConnection();//llama al metodo de db para obtener la coneccion
        $stmt = $db->query("SELECT * FROM users");
        //$stmt es ahora un statement PDO, un objeto que contiene el resultado de la consulta pero todavía no los datos “listas para usar”.

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //fetchAll(PDO::FETCH_ASSOC) → trae todos los registros como un array asociativo, donde las claves son los nombres de las columnas.

        //return → devuelve ese array al lugar donde se llamó al método getAll().
    }

    public static function crear($unEmail, $unName, $unLast_name, $unPassword){
        $db = DB::getConnection();
        $stmt = $db->prepare("INSERT INTO users (email,first_name,last_name,password) VALUES (?, ?, ?, ?)"
        return $stmt->execute([$unEmail, $unName, $unLast_name, $unPassword]);
        
    }
}
