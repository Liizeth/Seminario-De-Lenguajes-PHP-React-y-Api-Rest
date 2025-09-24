<?php

// DB imported on index.php
require_once __DIR__ . '/db.php';

class Courts {
    
    public $id;
    public $name;
    public $description;
    
    // Get all users from the database
    public static function getAll(){
        $db = DB::getConnection();
        $stmt = $db->query("SELECT * FROM courts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function crear($name, $description) {
        $db = DB::getConnection();
        $stmt = $db->prepare("INSERT INTO courts (name, description) VALUES (?, ?)");
                    //el id no se pasa porqu es aunto incremental
        return $stmt->execute([$name, $description]); //retorna F o V

//  $stmt->execute([$name, $description]);
//  return $db->lastInsertId(); // devuelve el id generad

    }



    public static function buscarPorNombre($name) {
        $db = DB::getConnection();
        $stmt = $db->prepare("SELECT * from courts WHERE name = ?"); // ? porque la consulta la paso por parametro 
        return $stmt->execute([$name]); //retorna F o V

        //return $stmt->fetchAll(PDO::FETCH_ASSOC); //retorna los resultados 
    }

    public static function buscarPorId($id) {
        $db = DB::getConnection();
        $stmt = $db->prepare("SELECT * from courts WHERE id = ?"); // ? porque la consulta la paso por parametro 
        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC); //retorna los resultados 
    }

    //que campos se pueden editar ?? ambos o solo uno 
    public static function editar($id, $name, $description){
        $db = DB::getConnection();
        $stmt = $db->prepare("UPDATE courts SET name = ? description = ? WHERE id = ?");
        return $stmt->execute([$name, $description,$id]); //retorna F o V
        
    }


    public static function eliminar($id){//elimina solo si no tiene reservas
        $db = DB::getConnection();
        $stmt = $db->prepare("DELETE FROM courts WHERE id = ? AND id NOT IN (SELECT * FROM booking WHERE court_id = ? )");
        return $stmt->execute([$id,$id]); //retorna F o V
        
    }

}