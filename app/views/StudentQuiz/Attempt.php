<?php require APPROOT . '/views/includes/header.php';

if (isset($data['questions']) && isset($data['quiz'])) {
    echo '<h3 > Attempting the quiz: ' . $data['quiz']->name . '</h3>';
    //var_dump($data['questions']);
    echo ' <form action="" method="post">';
    foreach ($data['questions'] as $num => $question) {
?>

        <div class="container mt-3">
            <p><?php echo $num + 1 . '. ' . $question->text; ?></p>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="option_1" name="<?php echo $question->id; ?>" value="<?php echo $question->option_1; ?>">
                <label class="form-check-label" for="option_1"><?php echo $question->option_1; ?></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="option_2" name="<?php echo $question->id; ?>" value="<?php echo $question->option_2; ?>">
                <label class="form-check-label" for="option_2"><?php echo $question->option_2; ?></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="option_3" name="<?php echo $question->id; ?>" value="<?php echo $question->option_3; ?>">
                <label class="form-check-label" for="option_3"><?php echo $question->option_3; ?></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="option_4" name="<?php echo $question->id; ?>" value="<?php echo $question->option_4; ?>">
                <label class="form-check-label" for="option_4"><?php echo $question->option_4; ?></label>
            </div>


        </div>


<?php
    }
} else {
    echo ' <div class="alert alert-warning" role="alert"> No Quiz found </div>';
}

?>
<button type="submit" name='submit_quiz' class="btn btn-primary mt-3">Submit</button>
</form>




<?php require APPROOT . '/views/includes/footer.php'; ?>