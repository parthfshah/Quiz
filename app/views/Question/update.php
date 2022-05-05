<?php require APPROOT . '/views/includes/header.php';
if (isset($data['question'])) {
    $question = $data['question'];
    $quizes = $data['quizes'];


    if ($question->quiz_id == null) {
        $question->quiz_id = 'Not set';
        $quiz_link = "";
    } else {
        $quiz_link = "<a href='/Quiz/quiz/$question->quiz_id'>";
    }
?>



    <form action='' method='post'>

        <div class="form-group">
            <label for="nameinput">Quiz</label>


            <select name="quiz_id">
                <?php
                foreach ($quizes as $quiz) {
                ?>
                    <option value="<?php echo $quiz->quiz_id; ?>">
                        <?php echo $quiz->name; ?>
                    </option>
                <?php
                }
                ?>
            </select>


        </div>

        <div class="form-group">
            <label for="nameinput">Question Text</label>
            <input name="text" type="text" class="form-control" id="nameinput" value="<?php echo $question->text ?>">
        </div>
        <div class="form-group">
            <label for="option_1">Option 1</label>
            <input name="option_1" type="text" class="form-control" id="option_1" value="<?php echo $question->option_1 ?>">
        </div>
        <div class="form-group">
            <label for="option_1">Option 2</label>
            <input name="option_2" type="text" class="form-control" id="option_1" value="<?php echo $question->option_2 ?>">
        </div>
        <div class="form-group">
            <label for="option_3">Option 3</label>
            <input name="option_3" type="text" class="form-control" id="option_1" value="<?php echo $question->option_3 ?>">
        </div>
        <div class="form-group">
            <label for="option_4">Option 4</label>
            <input name="option_4" type="text" class="form-control" id="option_1" value="<?php echo $question->option_4 ?>">
        </div>
        <div class="form-group">
            <label for="correct">Correct Ans</label>
            <input name="correct_ans" type="text" class="form-control" id="correct" value="<?php echo $question->correct_ans ?>">
        </div>
        <div class="form-group">
            <label for="correct">Grade</label>
            <input name="grade" type="text" class="form-control" id="correct" value="<?php echo $question->grade ?>">
        </div>

        <div class="pt-1 mb-4">
            <button class="btn btn-primary" type="submit" name="update">Update Question</button>
        </div>


    </form>

<?php
} else {
    echo ' <div class="alert alert-warning" role="alert"> Question not found </div>';
}
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>