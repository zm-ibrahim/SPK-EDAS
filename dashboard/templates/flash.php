<?php
if (isset($_SESSION['flash_message'])) { ?>
    <div class="alert alert-<?= $_SESSION['flash_message'][1] ?> alert-dismissible fade show" role="alert">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <?= $_SESSION['flash_message'][0] ?>
        </div>
    </div>
<?php
    unset($_SESSION['flash_message']);
} ?>