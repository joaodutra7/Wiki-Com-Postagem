<?php
    session_start();
    unset($_SESSION['usuario']);
    header('Location:\projeto_10\index.php');