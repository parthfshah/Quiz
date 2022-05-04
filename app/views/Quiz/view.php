<?php require APPROOT . '/views/includes/header.php';
if (isset($data['questions']) && isset($data['quiz'])) {
    echo '<h3> Questions for the quiz: ' . $data['quiz']->name . '</h3>';
?>

<table class="table table-bordered">
    <tr>
        <td>Question ID</td>
        <td>Quiz ID</td>
        <td>Question Text</td>
        <td>Options</td>
        <td>Correct Answer</td>

        <td colspan="3" class="text-center"> Actions</td>
    </tr>
    <?php
        foreach ($data["questions"] as $question) {
            echo "<tr>";
            echo "<td>$question->id</td>";
            echo "<td>$question->quiz_id</td>";
            echo "<td> <a href='/Quiz/quiz/" . $data['quiz']->quiz_id . "'>" . $data['quiz']->name . "</td>";
            echo "<td>$question->text</td>";

            echo "<td>";
            echo $question->option_1;
            echo $question->option_2;
            echo $question->option_3;
            echo $question->option_4;
            echo "</td>";
            echo "<td>$question->correct_ans</td>";
            echo "<td>
                <a href='/Quiz/Question/details/$question->id'> Details</a>
                </td>";
            echo "<td>
                <a href='/Quiz/Question/update/$question->id'> Update</a>
                </td>";
            echo "<td>
                <a href='/Quiz/Question/delete/$question->id'> Delete</a>
                </td>";
            echo "</tr>";
        }
        ?>
</table>

<?php } else {
    echo ' <div class="alert alert-warning" role="alert"> No Quiz found </div>';
}

?>



<?php require APPROOT . '/views/includes/footer.php'; ?>