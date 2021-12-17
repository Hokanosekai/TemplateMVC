<?php
extract($data);
?>

<?php if (!empty($errors)) {
    foreach ($errors as $error) { ?>
        <p class="error"><?= $error ?></p>
    <?php }
} ?>

<form action="<?= HOST ?>/index.php?page=login" method="post">
    <label for="mail">E Mail</label><br>
    <input type="email" name="mail" id="mail"><br><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password"><br><br>

    <input type="submit" value="Connection">
</form>
