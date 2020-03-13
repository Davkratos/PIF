<?php

session_start();
include_once("./sqlConnect.inc.php");

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    $query = "SELECT dtEmail, dtPassworthash, dtEmailBestaetigt FROM tblBenutzer WHERE dtEmail='".$email."' AND dtPassworthash='".$hash."' AND dtEmailBestaetigt='0'";

    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

    $rows  = mysqli_num_rows($result);

    if($rows > 0){

        mysqli_query($mysqli, "UPDATE tblBenutzer SET dtEmailBestaetigt='1' WHERE dtEmail='".$email."' AND dtPassworthash='".$hash."'") or die(mysqli_error($mysqli));
        echo 'Ihr Account mit der Email ' . $email . ' wurde erfolgreich aktiviert.';
        echo 'Sie können sich jetzt einloggen.';

    }else{

        echo 'Invalide URL oder der Account wurde schon verifiziert.';
    }

}else{

    echo 'Bitte benutzen Sie den Link in Ihrer Email.';
}