<?php
        $_SESSION = array();
        session_start();
        session_destroy();
        header("location:index.php");
        exit();
