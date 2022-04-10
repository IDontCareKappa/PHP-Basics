<form action="css.php" method="post">
    <textarea name="tekst"></textarea><br />
    <input type="submit" name="wyslij" value="Wyślij" />
</form>
<div>
    <?php
    $dane = filter_input(INPUT_POST, 'Wyślij', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_SANITIZE_STRING );
     echo $dane;
    ?>
</div>