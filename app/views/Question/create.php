<?php require APPROOT . '/views/includes/header.php';
$quizes = $data['quizes'];
?>



<h1>Create a new Question</h1>

<form action='' method='post' name="newQuestion">

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
        <input name="text" type="text" class="form-control" id="nameinput">
    </div>
    <div class=" form-group">
        <label for="option_1">Option 1</label>
        <input name="option_1" type="text" class="form-control" id="option_1">
    </div>
    <div class=" form-group">
        <label for="option_1">Option 2</label>
        <input name="option_2" type="text" class="form-control" id="option_1">
    </div>
    <div class=" form-group">
        <label for="option_3">Option 3</label>
        <input name="option_3" type="text" class="form-control" id="option_1">
    </div>
    <div class=" form-group">
        <label for="option_4">Option 4</label>
        <input name="option_4" type="text" class="form-control" id="option_1">
    </div>
    <div class=" form-group">
        <label for="correct">Correct Ans</label>
        <input name="correct_ans" type="text" class="form-control" id="correct">
    </div>
    <div class=" form-group">
        <label for="correct">Grade</label>
        <input name="grade" type="number" class="form-control" id="grade">
    </div>

    <div class=" pt-1 mb-4">
        <button class="btn btn-primary" type="submit" name="create">Create Question</button>
    </div>


</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>