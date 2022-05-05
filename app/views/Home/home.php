<?php require APPROOT . '/views/includes/header.php';

?>
<h1>Quiz Application</h1>
<p>Developed for KeyPath Edu Assessment</p>

<h3>Available Quizes</h3>
<div class="d-flex p-2 flex-row">

    <?php
    foreach ($data as $quiz) {
        echo '<div style="margin: 10px;" class="animate__animated animate__fadeInLeft"> 
          
          <div class="card admin-card" style="width:auto;"'; ?>
        onclick="location.href='/Quiz/StudentQuiz/<?php echo  $quiz->quiz_id;  ?>';">
    <?php
        echo '<div class="card-body">
              <h5 class="card-title">' . $quiz->name . '</h5>
          </div>
          </div>
      </div>';
    }
    ?>

</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>