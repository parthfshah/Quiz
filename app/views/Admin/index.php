<?php require APPROOT . '/views/includes/header.php';
?>

<div class="container">
    <h1 class="animate__animated animate__fadeIn">Admin Panel</h1>
    <div class="d-flex p-2 flex-row">

        <div style="margin: 10px;" onclick="location.href='/Quiz/Admin/Quizes';" class="admin-card">
            <div class="card admin-card" style="width:auto;">
                <div class="card-body">
                    <h4 class="card-title">Quizes</h5>
                        <h5>Total number: <?php echo $data['quizes']; ?></h5>
                </div>
            </div>
        </div>

        <div style="margin: 10px;" onclick="location.href='/Quiz/Admin/Questions';">
            <div class="card admin-card" style="width:auto;">
                <div class="card-body">
                    <h4 class="card-title">Questions</h4>
                    <h5>Total number: <?php echo $data['questions']; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>