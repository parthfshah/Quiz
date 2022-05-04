<?php require APPROOT . '/views/includes/header.php';
?>

<div class="container mt-5">
    <?php
        if (!empty($data['qrcode'])) {
            echo $data['qrcode'];
        }
	?>

    <div class="container mt-5">
        <?php
            if (!empty($data['msg'])) {
                echo    
                '<div class="alert alert-warning mb-5" role="alert">'
                    . $data['msg'] .
                '</div>';
            }
        ?>

        <form method='post' action='' enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" id="code" name="code" class="form-control form-control-lg" <?php
                   if (!empty($data['setup'])) {
                       if($data['setup']){
                           echo "disabled";
                       }
                   }
                ?> />
            </div>

            <div class="pt-1 mb-4">
                <button class="btn btn-dark btn-lg btn-block" type="submit" name="confirm" <?php
                   if (!empty($data['setup'])) {
                       if($data['setup']){
                           echo "disabled";
                       }
                   }
                ?>>Setup 2FA</button>
            </div>
        </form>
    </div>
</div>



<?php require APPROOT . '/views/includes/footer.php';
?>