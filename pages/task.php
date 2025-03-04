<?php
include '../Calendar.php';
$calendar = new Calendar('2025-02-25');
$calendar->add_event('Birthday', '2024-05-10', 1, 'green');
$calendar->add_event('Doctors', '2024-05-04', 1, 'red');
$calendar->add_event('Holiday', '2024-05-16', 7);

?>
<div class="container-sm">
    <div class="row">
        <!-- Task List (8 Columns) -->
        <div class="card task-card opacity-75 col-lg-9">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="ms-3">Tasks List</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createtask">
                    Add Task
                </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Calendar (4 Columns) -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Calendar</h4>
                </div>
                <div class="card-body">
                    <?=$calendar?>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- add task modal -->
<div class="modal fade " id="createtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content ">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">               
                <!-- Title Field -->
                <label for="title">Title</label>
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Task title" required>
                </div>
        
                <!-- Description Field -->
                <label for="description">Description</label>
                <div class="input-group mb-3">                   
                    <input type="text" name="description" class="form-control" placeholder="Description">
                </div>
        
                <!-- Due Date Field -->
                <label for="duedate">Due Date</label>
                <div class="input-group mb-3">
                    <input type="date" name="duedate" class="form-control">
                </div>    
        
                <!-- Status Field -->
                <label for="status">Status</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="status" id="status" required>
                        <option value="pending">Pending</option>
                        <option value="complete">Complete</option>
                    </select>
                </div>
        
                <!-- Priority Field -->
                <label for="priority">Priority</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="priority" id="priority" required>
                        <option value="low">Low</option>
                        <option value="high">High</option>
                        <option value="critical">Critical</option>
                    </select>
                </div>
        
                <!-- Submit Button -->
                <div class="form-group">
                    <input type="submit" value="Add a New Task" class="btn btn-primary">
                </div>
            </form>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



