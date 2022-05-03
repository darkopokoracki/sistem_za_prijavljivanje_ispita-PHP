<?php
    session_start();

    if (isset($_SESSION['admin'])) {
        $_SESSION = [];
        session_destroy();

        header('Location: login.php');
    }

?>