
<?php if (!empty($_SESSION['user'])) { ?>
    <h3>Hello, <?= $_SESSION['user']['nom'] ?> <?= $_SESSION['user']['prenom'] ?></h3>
<?php } ?>