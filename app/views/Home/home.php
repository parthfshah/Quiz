<?php require APPROOT . '/views/includes/header.php';
?>
<h1>Quiz Application</h1>
<p>Developed for KeyPath Edu Assessment</p>

<?php
if ($data != []) {
    echo '<div class="alert alert-success" role="alert">' .
        $data['msg'] . '
          </div>';
}
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>