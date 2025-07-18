<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['send'])) {
        // creating a function for testing user inputs !
        function test_input($data) {
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
        }
        // take user value after test !
        $title = test_input($_POST['title']);
        $due_date = test_input($_POST['date']);
        $difficulty = test_input($_POST['difficulty']);
        $category = test_input($_POST['category']);

        // i will create a table with key value !
        $difficulty_map = ['1' => 'low', '2' => 'mid', '3' => 'high'];
        // level is the value of key and key is the index and the index is the difficulty given by user !
        $level = $difficulty_map[$difficulty] ?? null; // i add this ?? null for tell the $difficulty is not null !
        
        if(!empty($title) && !empty($due_date) && !empty($difficulty) && !empty($category)){
            if($difficulty !== '0' && $level !== null){
                include('conx.php');
                $req = 'SELECT * FROM tasks WHERE title = ?';
                $stmt = $conn->prepare($req);
                $stmt->execute([$title]);
                if($stmt->rowCount() == 0){
                    $req2 = 'INSERT INTO tasks (title, due_date, difficulty, category) VALUES (?, ?, ?, ?)';
                    $stmt2 = $conn->prepare($req2);
                    $insertion = $stmt2->execute([$title, $due_date, $level, $category]);

                    if ($insertion) {
                        // the task was added !
                        echo "<script>alert('The task was added successfully!'); window.location.href='../index.php';</script>";
                    } else {
                        // somting went wrong !
                        echo "<script>alert('Error: Task could not be added.'); window.history.back();</script>";
                    }
                }else{
                    // make task not repeted !
                   echo "<script>alert('This task already exists!'); window.history.back();</script>"; 
                }
            }else{
                // check the user was enter the difficulty level !
                 echo "<script>alert('Please choose a valid difficulty level!'); window.history.back();</script>";
            }
        }else{
            // here for check if inputs is not empty !
            echo "<script>alert('Please fill in all fields!'); window.history.back();</script>";
        }
    }else{
        // Somthing went wrong !
        echo "<script>alert('Something went wrong!'); window.history.back();</script>";
    }
?>