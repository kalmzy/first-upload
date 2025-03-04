<?php 
include 'layout/header.php';
include 'Database/connection.php';
?>

<div class="wrapper">

<?php include 'layout/app.php';?>

<div class="main p-3" id="main-content">
        <div class="text-center">
            <div class="container">
                <h1>Hello [User],</h1>
            </div>
<style>


  .card-content
  {
    margin-right: 10px;
    border-radius: 20px;
  }
  .cover
  {
  border: 2px solid #797978;
  margin: 0;
  padding: 0;
  width: 90px;
  height: 20px;
  }
  .cover-1
  {
    margin-left: 32px;
  }
</style>

<div class="card col-sm-6 rounded-4 todo-list" style="background-color:rgba(255, 255, 255, 0.658);">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li onclick="changeContent('todo')" class="nav-item">
        <a onclick="changeTab(event,'todo')" class="nav-link active" aria-current="true" href="#">To Do</a>
      </li>
      <li onclick="changeContent('calendar')" class="nav-item">
        <a onclick="changeTab(event,'calendar')" class="nav-link" href="#">Calendar</a>
      </li>
    </ul>
  </div>
  <div class="card-body" id="cardBody">
  <div class="row">
    <div class="card ms-2 col-3 card-content" style="background:#dadad8; max-width: 300px;">
      <div class=" card-header bg-info w-100">
        To do
      </div>
      <div class="card-body">
          <div class=" card">
            <h5 class=" text-center">title</h5>
            <ul>
              <li>Deadline</li>
              <li>Status</li>
              <li>Priority</li>
            </ul>
          </div>
        </div>    
      </div>
      
      <div class="card col card-content">
        <div class=" card-header bg-warning">
          In Progress
        </div>
        <div class="card-body">
          <div class=" card">
            <h5 class=" text-center">title</h5>
            <ul>
              <li>Deadline</li>
              <li>Status</li>
              <li>Priority</li>
            </ul>
          </div>
        </div>        
      </div>

      <div class="card col card-content">
        <div class=" card-header bg-danger">
          In Review
        </div>
        <div class="card-body">
          <div class=" card">
            <h5 class=" text-center">title</h5>
            <ul>
              <li>Deadline</li>
              <li>Status</li>
              <li>Priority</li>
            </ul>
          </div>
        </div>        
      </div>

      <div class="card col card-content">
        <div class=" card-header bg-secondary">
          Completed
        </div>
        <div class="card-body">
          <div class=" card">
            <h5 class=" text-center">title</h5>
            <ul>
              <li>Deadline</li>
              <li>Status</li>
              <li>Priority</li>
            </ul>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>




<script>

function changeTab(event, tab) {
  const tabs = document.querySelectorAll('.nav-link');
  tabs.forEach(tab => tab.classList.remove('active')); // Remove active class from all
  event.currentTarget.classList.add('active'); // Add active class to clicked tab
  // Additional content change logic goes here
}

function changeContent(type) {
  const cardBody = document.getElementById('cardBody');
  if (type === 'todo') {
      cardBody.innerHTML = `  <div class="row">
    <div class="card ms-2 col card-content">
      <div class=" card-header bg-info">
        To do
      </div>
      <div class="card-body">
        <div class=" card">
          <h5 class=" text-center">title</h5>
          <ul>
            <li>Deadline</li>
            <li>Status</li>
            <li>Priority</li>
          </ul>
        </div>
        </div>
      </div>
      
      <div class="card col card-content">
        <div class=" card-header bg-warning">
          To do
        </div>
        <div class="card-body">
          <div class=" card">
            <h5 class=" text-center">title</h5>
            <ul>
              <li>Deadline</li>
              <li>Status</li>
              <li>Priority</li>
            </ul>
          </div>
        </div>        
      </div>

      <div class="card col card-content">
        <div class=" card-header bg-danger">
          To do
        </div>
        <div class="card-body">
          <div class=" card">
            <h5 class=" text-center">title</h5>
            <ul>
              <li>Deadline</li>
              <li>Status</li>
              <li>Priority</li>
            </ul>
          </div>
        </div>        
      </div>

      <div class="card col card-content">
        <div class=" card-header bg-secondary">
          To do
        </div>
        <div class="card-body">
          <div class=" card">
            <h5 class=" text-center">title</h5>
            <ul>
              <li>Deadline</li>
              <li>Status</li>
              <li>Priority</li>
            </ul>
          </div>
        </div>        
      </div>
    </div>
  </div>`;
  } else if (type === 'calendar') {
      cardBody.innerHTML = '<div id="calendar"></div>';

      var calendar = $('#calendar').fullCalendar({

      });
  }
}
</script>

        </div>
    </div>

</div>

<?php include 'layout/footer.php'?>