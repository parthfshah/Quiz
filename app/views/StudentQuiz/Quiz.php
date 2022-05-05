<?php require APPROOT . '/views/includes/header.php';

if (isset($data['questions']) && isset($data['quiz'])) {
    echo '<h3 > Name of the quiz: ' . $data['quiz']->name . '</h3>';
    echo '<h3> Total questions: ' . count($data['questions']) . '</h3>';
    echo '<h3> Total grade for this quiz: ' . $data['totalGrade'] . '</h3>';

    $disabled = count($data['questions']) == 0 ?  true : false;

?>
    <button class="btn btn-primary" onclick="location.href='/Quiz/Admin/Quizes';">Go back</button>
    <button class="btn btn-primary" onclick="location.href='/Quiz/StudentQuiz/Attempt/<?php echo  $data['quiz']->quiz_id; ?>'" <?php echo $disabled ? 'disabled' : ''; ?>>Attempt the quiz</button>

<?php
    if ($disabled) {
        echo ' <div class="alert alert-warning mt-2" role="alert"> Sorry, you can not attempt this quiz because there are no questions </div>';
    }
} else {
    echo ' <div class="alert alert-warning" role="alert"> No Quiz found </div>';
}

?>



<?php require APPROOT . '/views/includes/footer.php'; ?>