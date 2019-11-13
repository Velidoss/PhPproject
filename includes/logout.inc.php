<?php

session_start();

// прекращение сессии
session_unset();
session_destroy();
header("Location: ../index.php");