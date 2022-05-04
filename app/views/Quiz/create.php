<?php require APPROOT . '/views/includes/header.php';
?>



<h1>Create a new Quiz</h1>

<form action='' method='post' enctype='multipart/form-data' id='newQuiz'
    onsubmit='event.preventDefault(); validateQuizForm()'>

    <div class="form-group">
        <label for="nameinput">Name</label>
        <input name="name" type="text" class="form-control" id="nameinput" placeholder="Name">
    </div>

    <button type="submit" name='create' class="btn btn-primary mt-2">Create</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>