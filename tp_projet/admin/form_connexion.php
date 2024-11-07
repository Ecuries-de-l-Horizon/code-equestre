<?php
    session_start();
?>

<html>
    <form action = "connexion.php" method = "post">
        <input type="text" id="mail" name="mail" />
        <input type="text" id="mdp" name="mdp" />
        <input type="submit"/>
    </form>
</html>