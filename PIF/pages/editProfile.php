<?php

session_start();
include_once("./sqlConnect.inc.php");

$benutzername = $_SESSION["username"];
$query = "SELECT * FROM tblbenutzer WHERE dtBenutzername = '$benutzername' OR dtEmail = '$benutzername'";
$results = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($results);

$profileEmail = $row[5];

if (isset($_POST['save'])) {
    $errors = array();
    // receive all input values from the form
    $picture = mysqli_real_escape_string($mysqli, $_POST['foto']);

    if (count($errors) == 0) {
        $update_query = "UPDATE tblbenutzer SET dtProfilFoto=? WHERE dtEmail='$profileEmail'";
        $stmt = $mysqli->prepare($update_query);
        $stmt->bind_param("s", $picture);
        $stmt->execute();
        $stmt->close();
        header("refresh:2;url=http://localhost/PIF/index.php?page=#profile");
    }
    if (count($errors) > 0):
        ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php header("refresh:2;url=http://localhost/PIF/index.php?page=#register");endif ?>
    <?php
}
?>