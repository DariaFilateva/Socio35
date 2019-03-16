<?php
require "libs/db.php";
//session_unset();
unset($_SESSION['logged_user']);
header('Location: /');

php?>