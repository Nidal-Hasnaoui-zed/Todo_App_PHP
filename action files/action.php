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
        if($difficulty === '1'){
            $level = 'low'; 
        }elseif($difficulty ==='2'){
            $level = 'mid'; 
        }elseif($difficulty==='3'){
            $level = 'heigh'; 
        }else{
            // must add an alert with unknowen vakue !
        }
        $category = test_input($_POST['category']); 
        if(!empty($title) && !empty($due_date) && !empty($difficulty) && !empty($category)){
           if($difficulty != '0'){
                 // including conx.php file .
            include('conx.php'); 
            $req = 'select * from tasks where title=?';
            $stmt = $conn->prepare($req); 
            $stmt->execute([$title]);
            if($stmt->rowCount() == 0){
                $req2 = 'insert into tasks(title,due_date,difficulty,category) values (?,?,?,?)'; 
                $stmt2 = $conn->prepare($req2); 
                $insertion = $stmt->execute([$title,$due_date,$level,$category]); 
                if($insertion){
                    // must add alert with this content !
                    // the task was added !
                }else{
                    // must add alert with this content !
                    // the task was not addes plq try again !
                }
            }else{
                // must add an alert witht this content !
                // this content alrady exist 
            }
           }else{
                // must add an alert with this content : "plz chose dificckety level !"
           }
        }else{
            // must enter pzll enter all fileds in the from (add alert witj this contnet !)
        }
    }else{
        // add an alert with this content ! 
        // somthing wrong !
    }
?>