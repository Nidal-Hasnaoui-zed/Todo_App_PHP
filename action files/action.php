<?php 
    if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['send']) ){
        function test_input($data){
            $data = htmlspecialchars($data); 
            $data = stripcslashes($data); 
            $data = trim($data); 
            return $data ; 
        }
        $title = test_input($_POST['title']); 
        $due_date = test_input($_POST['date']); 
        $difficulty = test_input($_POST['difficulty']); 
        $category = test_input($_POST['category']); 
    }else{
        // add an alert with this content ! 
        // plz enter a form !
    }
?>