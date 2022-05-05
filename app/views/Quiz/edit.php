<?php require APPROOT . '/views/includes/header.php';
?>



<h1>Edit the quiz: <?php echo $data->quiz_id; ?> </h1>

<form action='' method='post' enctype='multipart/form-data' id='editQuiz'>

    <div class="form-group">
        <label for="nameinput">Name</label>
        <input name="name" type="text" class="form-control" id="nameinput" value=" <?php echo $data->name; ?>">
    </div>

    <button type="submit" name=' edit' class="btn btn-primary mt-2">Edit</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>