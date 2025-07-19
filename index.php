<?php 
    include('../todo_app/action files/conx.php'); 
    $req = 'select * from tasks'; 
    $stmt = $conn->query($req);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Todo List Pro</title>
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- Font Awesome Icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa fa-list-check me-1"></i> Todo List Pro</a>
    </div>
  </nav>

  <div class="container py-4">
    
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h5 class="card-title mb-3">Add a new Task !</h5>
        <form action="action files/action.php" method="post">
            <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Title</label>
                <input id="task-title" class="form-control" name="title" placeholder="Example : Code Writing !" />
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Date</label>
                <input id="task-date" type="date" name="date" class="form-control" />
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Difficulty</label>
                <select name="difficulty" id="task-priority" class="form-select">
                <option value="0" selected>—</option>
                <option value="1">Low</option>
                <option value="2">Mid</option>
                <option value="3">Heigh</option>
                </select>difficulty
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Category</label>
                <input id="task-category" name="category" class="form-control" placeholder="Ex: Project !" />
            </div>
            <div class="col-md-2 d-grid">
                <button id="add-btn" class="btn btn-success" name="send">
                <i class="fa fa-plus"></i> Add 
                </button>
            </div>
            </div>
        </form>
      </div>
    </div>

    
    <div
      class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2"
    >
      <div id="task-stats" class="fw-bold"></div>
      <div class="btn-group" role="group">
        <button
          class="btn btn-outline-primary filter-btn active"
          data-filter="all"
        >
          All
        </button>
        <button
          class="btn btn-outline-primary filter-btn"
          data-filter="active"
        >
          Active 
        </button>
        <button
          class="btn btn-outline-primary filter-btn"
          data-filter="completed"
        >
          Done 
        </button>
      </div>
      <a href="../todo_app/action files/deletAll.php">
         <button id="clear-completed-btn" class="btn btn-outline-danger btn-sm">
          <!-- after you must make this button be the button of delet all completed task ! -->
           <i class="fa fa-trash"></i> Delet Incompleted Task 
        </button>
      </a>
    </div>

     <div style="width: 1000px;margin:40px auto">
        <table class="table table-striped">
        <thead>
            <tr>
              <td>task title</td>
              <td>task date</td>
              <td>task Difficulty</td>
              <td>task Category</td>
              <td>task stat</td>
              <td>Delet</td>
              <td>Edit</td>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($all_tasks as $task){
              $tr = "<tr><td>"; 
              $tr .= $task['title']; 
              $tr .= "</td><td>" ;
              $tr .= $task['due_date']; 
              $tr .= "</td><td>" ;
              $tr .= $task['difficulty']; 
              $tr .= "</td><td>" ;
              $tr .= $task['category'];
              $tr .= "</td><td>" ;
              $tr .= $task['state'];
              $tr .= "</td><td>" ;
              $tr .= "<button class='btn btn-danger btn-sm'><a style='text-decoration:none;color:white' href='../todo_app/action files/delet.php?idtask=";
              $tr .= $task['id']; 
              $tr .= "'><i class='fa fa-trash fa-lg'></i></a></button>";
              $tr .= "</td><td>" ;
              $tr .= "<button class='btn btn-primary btn-sm' onclick='toggleEdit()'> <i class='fa fa-pen fa-lg'></i></button>";
              $tr .= "</td></tr>";
              echo $tr ;
            }
          ?>
        </tbody>
     </table>
     </div>

  </div>
  
    <!-- hedden edit ask Card  -->

    <div id="task_card">
      <button class="btn-close position-absolute top-0 end-0 m-2" onclick="toggleEdit(false)"></button>
      <h5>Edit Task</h5>
      <p>Dont work right knew !</p>
    </div>

  
  <!-- Bootstrap & Sortable JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<!-- i make this as comment bc i wnna work this project with php not js ! -->
  <!-- <script src="script.js"></script> -->

  <script>
      function toggleEdit(show = true) {
        const taskCard = document.getElementById('task_card');
        if (show) {
          taskCard.classList.add('show');
        } else {
          taskCard.classList.remove('show');
          setTimeout(() => {
            taskCard.style.display = "none";
          }, 300); // match transition
        }
      }

      // Override display none manually when showing
      document.querySelectorAll('.btn-primary').forEach(btn => {
        btn.addEventListener('click', () => {
          const card = document.getElementById('task_card');
          card.style.display = 'block';
          setTimeout(() => {
            card.classList.add('show');
          }, 10);
        });
      });
</script>

   
</body>
</html>
