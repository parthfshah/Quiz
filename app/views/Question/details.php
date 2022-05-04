<?php require APPROOT . '/views/includes/header.php';
if (isset($data['question'])) {
    $question = $data['question'];

    if ($question->quiz_id == null) {
        $question->quiz_id = 'Not set';
        $quiz_link = "";
    } else {
        $quiz_link = "<a href='/Quiz/quiz/$question->quiz_id'>";
    }
?>

<style>
input {
    pointer-events: none;
}
</style>

<form action='' method='post'>
    <h4><?php echo $quiz_link; ?> Quiz ID: <?php echo $question->quiz_id; ?> </a></h4>
    <div class="form-group">
        <label for="nameinput">Question Text</label>
        <input name="name" type="text" class="form-control" id="nameinput" placeholder="<?php echo $question->text ?>">
    </div>
    <div class="form-group">
        <label for="option_1">Option 1</label>
        <input name="option_1" type="text" class="form-control" id="option_1"
            placeholder="<?php echo $question->option_1 ?>">
    </div>
    <div class="form-group">
        <label for="option_1">Option 2</label>
        <input name="option_2" type="text" class="form-control" id="option_1"
            placeholder="<?php echo $question->option_2 ?>">
    </div>
    <div class="form-group">
        <label for="option_3">Option 3</label>
        <input name="city" type="text" class="form-control" id="option_1"
            placeholder="<?php echo $question->option_3 ?>">
    </div>
    <div class="form-group">
        <label for="option_4">Option 4</label>
        <input name="city" type="text" class="form-control" id="option_1"
            placeholder="<?php echo $question->option_4 ?>">
    </div>
    <div class="form-group">
        <label for="correct">Correct Ans</label>
        <input name="correct_ans" type="text" class="form-control" id="correct"
            placeholder="<?php echo $question->correct_ans ?>">
    </div>


</form>

<?php
} else {
    echo ' <div class="alert alert-warning" role="alert"> Question not found </div>';
}
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>