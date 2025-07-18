<?php 
    if(isset($_GET['idtask'])){
        $id = $_GET['idtask']; 
        include('../action files/conx.php'); 
        $req = 'DELETE FROM tasks WHERE id =?'; 
        $stmt = $conn->prepare($req); 
        $stmt->execute([$id]); 
        if($stmt->rowCount() === 0){
            // sorry no task found ! (add an alert with this contnet !)
        }else{
            // task was succefely deleted (add an alert with this connten !)
            header('location:../index.php');
        }
    }else{  
        // add an alert with this content ! 
        // the task not found !
    }
?>