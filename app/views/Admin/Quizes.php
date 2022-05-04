<?php require APPROOT . '/views/includes/header.php';
?>

<div class="container">
    <h1>Admin Panel</h1>
    <h3>Quizes</h3>
    <div class="d-flex p-2 flex-row">

        <?php
        foreach ($data['quizes'] as $quiz) {
            echo '<div style="margin: 10px;"> 
          
          <div class="card" style="width:auto;">
          <div class="card-body">
              <h5 class="card-title">' . $quiz->name . '</h5>
              <a href="/Quiz/quiz/' . $quiz->quiz_id . '" class="btn btn-primary">View</a>
              <a href="/Quiz/Admin/editQuiz/' . $quiz->quiz_id . '" class="btn btn-primary">Edit</a>
              <a href="/Quiz/Admin/deleteQuiz/' . $quiz->quiz_id . '" class="btn btn-primary" onclick="return confirmDelete()">Delete</a>
          </div>
          </div>
      </div>';
        }
        ?>

    </div>
    <a href="/Quiz/quiz/create" class="btn btn-primary">Add a new Quiz</a>

</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>