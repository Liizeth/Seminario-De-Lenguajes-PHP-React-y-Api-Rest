<?php

class DB {
    private static $connection; //$connection guarda la coneccion a la BD
				//Es static para que sea única y compartida en toda la aplicación (no se crean varias conexiones innecesarias).
				
    public static function getConnection() {//recordar que los metodos Static no hace falta hacer instacia de la clase para poder usarlos 
        if (!self::$connection) {//self se usa dentro de una clase para referirse a propiedades o métodos estáticos (que no dependen de una instancia).
        
        //this se usa dentro de un objeto instanciado → hace referencia a esa instancia en particular.
        
        
            $host = 'db';
            $dbname = 'seminariophp';
            $user = 'seminariophp';
            $pass = 'seminariophp';

            try {//crea la coneccion 
                self::$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
                //PDO permite ejecutar consultas SQL
                //config errores si es que los tuviera 
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die(json_encode(['error' => $e->getMessage()]));
                //responde con un JSON que contiene el mensaje del error.
                
                //getMessage()Es un método propio de la clase Exception (de la que hereda PDOException).
                //hay muchos metodos de error -pueden que sirvan despues 
            }
        }

        return self::$connection;
        //devuelve la coneccion creada o la ya existente
    }
}