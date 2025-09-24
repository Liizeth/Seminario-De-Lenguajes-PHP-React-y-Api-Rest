<?php

// DB imported on index.php
require_once __DIR__ . '/db.php';

class Bookings_participants {

    public $booking_id;
    public $user_id;

    // Get all users from the database
    public static function getAll(){
        $db = DB::getConnection();
        $stmt = $db->query("SELECT * FROM bookings_participants");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}