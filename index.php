<!DOCTYPE html>
<html lang="en">
<head>
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
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- شريط الترويسة -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa fa-list-check me-1"></i> Todo List Pro</a>
    </div>
  </nav>

  <div class="container py-4">
    <!-- بطاقة إضافة مهمة جديدة -->
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
                <select name="" id="task-priority" class="form-select">
                <option value="0" selected>—</option>
                <option value="High">Heigh</option>
                <option value="Medium">Mid</option>
                <option value="Low">Low</option>
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
      <button id="clear-completed-btn" class="btn btn-outline-danger btn-sm">
        <i class="fa fa-trash"></i> Delect Completed Task 
      </button>
    </div>

    <!-- قائمة المهام -->
    <ul id="task-list" class="list-group"></ul>
  </div>

  <!-- نافذة تعديل المهمة -->
  <div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-labelledby="editModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit A task </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form id="edit-form">
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input id="edit-title" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Date</label>
              <input id="edit-date" type="date" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Primary</label>
              <select id="edit-priority" class="form-select">
                <option value="">—</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">category</label>
              <input id="edit-category" class="form-control" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Cancel
          </button>
          <button type="button" class="btn btn-primary" id="save-edit-btn">
            Save 
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap & Sortable JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

  <script src="script.js"></script>
</body>
</html>
