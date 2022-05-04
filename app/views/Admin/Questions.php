<?php require APPROOT . '/views/includes/header.php';
?>

<table class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>Quiz ID</td>
        <td>Question Text</td>
        <td>Options</td>
        <td>Correct Answer</td>
        <td colspan="3" class="text-center"> Actions</td>
    </tr>
    <?php
    foreach ($data["questions"] as $question) {

        if ($question->quiz_id == null) {
            $question->quiz_id = 'Not set';
            $quiz_link = "";
        } else {
            $quiz_link = "<a href='/Quiz/quiz/$question->quiz_id'>";
        }

        echo "<tr>";
        echo "<td>$question->id</td>";
        echo "<td>" . $quiz_link . $question->quiz_id . " </a></td>";
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



<?php require APPROOT . '/views/includes/footer.php'; ?>