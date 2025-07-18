<?php

if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['send'])) {
    function test_input($data) {
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }

    $title = test_input($_POST['title']);
    $due_date = test_input($_POST['date']);
    $difficulty = test_input($_POST['difficulty']);
    $category = test_input($_POST['category']);

    $difficulty_map = ['1' => 'low', '2' => 'mid', '3' => 'high'];
    $level = $difficulty_map[$difficulty] ?? null;

    if (!empty($title) && !empty($due_date) && !empty($difficulty) && !empty($category)) {
        if ($difficulty !== '0' && $level !== null) {
            include('conx.php');
            $req = 'SELECT * FROM tasks WHERE title = ?';
            $stmt = $conn->prepare($req);
            $stmt->execute([$title]);

            if ($stmt->rowCount() == 0) {
                $req2 = 'INSERT INTO tasks (title, due_date, difficulty, category) VALUES (?, ?, ?, ?)';
                $stmt2 = $conn->prepare($req2);
                $insertion = $stmt2->execute([$title, $due_date, $level, $category]);

                if ($insertion) {
                    echo "<script>alert('The task was added successfully!'); window.location.href='../index.php';</script>";
                } else {
                    echo "<script>alert('Error: Task could not be added.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('This task already exists!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Please choose a valid difficulty level!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Something went wrong!'); window.history.back();</script>";
}
?>
