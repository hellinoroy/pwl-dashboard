<?php $session = service('session'); if($session->getFlashdata()) : ?>
    <div class="toast position-absolute top-0 start-0 m-5" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header 
        <?php if($session->getFlashdata("success")){ echo "bg-primary";} else {echo "bg-danger";} ?>">
        <strong class="me-auto">Info</strong>  
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">

        <?php 
        $successMessage = $session->getFlashdata("success");
        $errorMessages = $session->getFlashdata("error");
        ?>
        <?php if(is_array($errorMessages)): ?>
            <?php foreach ($errorMessages as $key => $message): ?>
                <p><?= "$key: $message" ?></p>
            <?php endforeach ?>
        <?php elseif ($successMessage): ?>
            <?= $successMessage ?>
        <?php elseif ($errorMessages): ?>
            <?= $errorMessages ?>
        <?php endif ?>

        </div>
    </div>
<?php endif; ?>