<?php require APPROOT . '/views/includes/header.php'; 
$question = $data['question'];
?>

<style>
input {w
    pointer-events: none;
}
</style>

<form action='' method='post'>

    <div class="form-group">
        <label for="nameinput">Question Text</label>
        <input name="name" type="text" class="form-control" id="nameinput" placeholder="<?php echo $question->text?>">
    </div>
    <div class="form-group">
        <label for="cityinput">Option 1</label>
        <input name="city" type="text" class="form-control" id="cityinput"
            placeholder="<?php echo $question->option_1?>">
    </div>
    <div class="form-group">
        <label for="cityinput">Option 2</label>
        <input name="city" type="text" class="form-control" id="cityinput"
            placeholder="<?php echo $question->option_2?>">
    </div>
    <div class="form-group">
        <label for="cityinput">Option 3</label>
        <input name="city" type="text" class="form-control" id="cityinput"
            placeholder="<?php echo $question->option_3?>">
    </div>
    <div class="form-group">
        <label for="cityinput">Option 4</label>
        <input name="city" type="text" class="form-control" id="cityinput"
            placeholder="<?php echo $question->option_4?>">
    </div>
    <div class="form-group">
        <label for="cityinput">Correct Ans</label>
        <input name="city" type="text" class="form-control" id="cityinput"
            placeholder="<?php echo $question->correct_ans?>">
    </div>


</form>
<?php require APPROOT . '/views/includes/footer.php'; ?>