<?php
session_start();
if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    $_SESSION = array();
}