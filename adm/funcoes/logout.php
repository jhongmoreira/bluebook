<?php
    session_name("MaisSG");
    session_start();
    session_destroy();

    header("Location: ../index.php");
?>
