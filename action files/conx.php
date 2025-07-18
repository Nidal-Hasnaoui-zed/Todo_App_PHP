<?php 
    $server_name = 'localhost';
    $db_name = 'todo_list_app'; 
    $user_name = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $user_name, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('<div style="color: red;">⚠️ Database connection error: ' . $e->getMessage() . '</div>');
    }
?>
