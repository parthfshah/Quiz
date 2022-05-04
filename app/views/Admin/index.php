<?php require APPROOT . '/views/includes/header.php'; 
?>

<div class="container">
    <h1>Admin Panel</h1>
    <div class="d-flex p-2 flex-row">

        <?php
      foreach($data['quizes'] as $quiz){
          echo '<div style="margin: 10px;"> 
          
          <div class="card" style="width:auto;">
          <div class="card-body">
              <h5 class="card-title">'.$quiz->name.'</h5>
              <a href="/Quiz/quiz/'.$quiz->quiz_id.'" class="btn btn-primary">View</a>
              <a href="#" class="btn btn-primary">Edit</a>
              <a href="#" class="btn btn-primary">Delete</a>
          </div>
          </div>
      </div>';
      } 
?>
    </div>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>