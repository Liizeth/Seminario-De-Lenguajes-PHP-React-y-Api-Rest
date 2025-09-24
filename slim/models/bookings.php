<?php

// DB imported on index.php
require_once __DIR__ . '/db.php';

class Bookings {

    public $id;
    public $created_by;
    public $court_id;
    public $bookin_detetime;
    public $duration_block;

    // Get all users from the database
    public static function getAll(){
        $db = DB::getConnection();
        $stmt = $db->query("SELECT * FROM bookings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}