<?php 
    $server_name = 'localhost';
    $db_name = ' todo_list_app'; 
    $user_name = 'root'; 
    $password = ''; 
  try {
    $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  }  catch (PDOException $e){
        die('sorry but you have some probelm with db ! like this one : <br>'. $e->getMessage()); 
  }
?>