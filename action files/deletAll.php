<?php 
    include('../action files/conx.php'); 
    $req = 'DELETE FROM tasks WHERE state ="not started"'; 
    $insertion = $stmt = $conn->query($req); 
    if($insertion){
        // add an alert with this content !
        // all task complited was deletd succesfelly !
        header('location:../index.php'); 
    }else{
        // i will add this msj now for you can understand me !
        echo "emmm, somthins was worng !"; 
        // heare you must back to the index.php and tell user some err here okey !
    }

?>