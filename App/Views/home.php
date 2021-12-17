<?php
extract($data);

var_dump($params);
?>

<h1>MVC Template</h1>

<?php if (empty($_SESSION['user'])) { ?>
    <a href="<?= HOST ?>/index.php?page=login">Login</a>
<?php } ?>