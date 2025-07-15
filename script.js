
    // /* =====================================================
    //   🚀 Todo List Pro — كود جافاسكريبت
    //   وظائف أساسية:
    //     - إضافة / حذف / تعديل / إكمال مهمة
    //     - فلاتر: الكل، نشطة، منجزة
    //     - سحب و إفلات لإعادة الترتيب (Sortable.js)
    //     - تخزين محلي (localStorage) للحفظ التلقائي
    // ====================================================== */

    // // ---------------------------------- البيانات
    // let tasks = JSON.parse(localStorage.getItem("tasks") || "[]");
    // let filter = "all";

    // // ---------------------------------- عناصر DOM
    // const taskList = document.getElementById("task-list");
    // const titleInput = document.getElementById("task-title");
    // const dateInput = document.getElementById("task-date");
    // const priorityInput = document.getElementById("task-priority");
    // const categoryInput = document.getElementById("task-category");

    // // ---------------------------------- حفظ + رسم
    // function save() {
    //   localStorage.setItem("tasks", JSON.stringify(tasks));
    // }

    // function priorityBadgeColor(p) {
    //   return p === "High" ? "danger" : p === "Medium" ? "warning" : "success";
    // }

    // function render() {
    //   taskList.innerHTML = "";

    //   // فلترة
    //   const visible = tasks.filter((t) =>
    //     filter === "all" ? true : filter === "active" ? !t.completed : t.completed
    //   );

    //   visible.forEach((task) => {
    //     const li = document.createElement("li");
    //     li.className =
    //       "list-group-item d-flex justify-content-between align-items-center";
    //     if (task.completed) li.classList.add("completed");
    //     li.dataset.id = task.id;

    //     li.innerHTML = `
    //       <div class="form-check">
    //         <input class="form-check-input toggle" type="checkbox" ${
    //           task.completed ? "checked" : ""
    //         } />
    //         <label class="form-check-label">
    //           ${task.title}
    //           ${
    //             task.date
    //               ? ` <small class="text-muted">(${task.date})</small>`
    //               : ""
    //           }
    //           ${
    //             task.priority
    //               ? ` <span class="badge bg-${priorityBadgeColor(task.priority)}">${task.priority}</span>`
    //               : ""
    //           }
    //           ${
    //             task.category
    //               ? ` <span class="badge bg-secondary">${task.category}</span>`
    //               : ""
    //           }
    //         </label>
    //       </div>
    //       <div>
    //         <button class="btn btn-sm btn-outline-secondary me-1 edit">
    //           <i class="fa fa-pen"></i>
    //         </button>
    //         <button class="btn btn-sm btn-outline-danger delete">
    //           <i class="fa fa-trash"></i>
    //         </button>
    //       </div>`;

    //     taskList.appendChild(li);
    //   });

    //   // إحصائيات
    //   document.getElementById(
    //     "task-stats"
    //   ).textContent = `Residual: ${tasks.filter((t) => !t.completed).length} / Total: ${tasks.length}`;
    // }

    // // ---------------------------------- إضافة مهمة
    // document.getElementById("add-btn").addEventListener("click", () => {
    //   const title = titleInput.value.trim();
    //   if (!title) return;

    //   tasks.push({
    //     id: Date.now(),
    //     title,
    //     date: dateInput.value,
    //     priority: priorityInput.value,
    //     category: categoryInput.value.trim(),
    //     completed: false,
    //   });

    //   // إعادة ضبط الحقول
    //   titleInput.value = "";
    //   dateInput.value = "";
    //   priorityInput.value = "";
    //   categoryInput.value = "";

    //   save();
    //   render();
    // });

    // // ---------------------------------- إجراءات على القائمة
    // taskList.addEventListener("click", (e) => {
    //   const li = e.target.closest("li");
    //   if (!li) return;
    //   const id = Number(li.dataset.id);

    //   // تبديل الإكمال
    //   if (e.target.classList.contains("toggle")) {
    //     const task = tasks.find((t) => t.id === id);
    //     task.completed = e.target.checked;
    //     save();
    //     render();
    //   }

    //   // حذف
    //   if (e.target.closest(".delete")) {
    //     tasks = tasks.filter((t) => t.id !== id);
    //     save();
    //     render();
    //   }

    //   // تعديل
    //   if (e.target.closest(".edit")) {
    //     openEditModal(id);
    //   }
    // });

    // // ---------------------------------- نافذة التعديل
    // function openEditModal(id) {
    //   const task = tasks.find((t) => t.id === id);

    //   document.getElementById("edit-title").value = task.title;
    //   document.getElementById("edit-date").value = task.date;
    //   document.getElementById("edit-priority").value = task.priority;
    //   document.getElementById("edit-category").value = task.category;

    //   const modalElement = document.getElementById("editModal");
    //   const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
    //   modal.show();

    //   document.getElementById("save-edit-btn").onclick = () => {
    //     task.title = document.getElementById("edit-title").value.trim();
    //     task.date = document.getElementById("edit-date").value;
    //     task.priority = document.getElementById("edit-priority").value;
    //     task.category = document.getElementById("edit-category").value.trim();

    //     save();
    //     render();
    //     modal.hide();
    //   };
    // }

    // // ---------------------------------- فلاتر
    // document.querySelectorAll(".filter-btn").forEach((btn) => {
    //   btn.addEventListener("click", () => {
    //     document.querySelector(".filter-btn.active").classList.remove("active");
    //     btn.classList.add("active");
    //     filter = btn.dataset.filter;
    //     render();
    //   });
    // });

    // // ---------------------------------- حذف المنجز
    // document
    //   .getElementById("clear-completed-btn")
    //   .addEventListener("click", () => {
    //     tasks = tasks.filter((t) => !t.completed);
    //     save();
    //     render();
    //   });

    // // ---------------------------------- Sortable (سحب و إفلات)
    // new Sortable(taskList, {
    //   animation: 150,
    //   onEnd: () => {
    //     tasks = Array.from(taskList.children).map((li) =>
    //       tasks.find((t) => t.id == li.dataset.id)
    //     );
    //     save();
    //   },
    // });

    // // ---------------------------------- بدء التشغيل
    // render();
  