<?php
session_start();
include_once("./sqlConnect.inc.php");
if (isset($_POST['email']) && isset($_POST["passwort"])) {

    $errors = array();

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $benutzername = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['passwort']);

    if (empty($email)) {
        array_push($errors, "Email/Username is equired");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM tblbenutzer WHERE dtEmail = '$email' OR dtBenutzername = '$benutzername' AND dtPassworthash = '$password'";
        $results = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_array($results);
        $username = $row["dtBenutzername"];
        $email = $row["dtEmail"];
        $iduser = $row["idBenutzercode"];

        echo "Logging in User: " . $benutzername . " ID: " . $iduser;

        if (mysqli_num_rows($results) == 1 && $row["dtEmailBestaetigt"] == 1) {
            $_SESSION["username"] = $benutzername;
            $_SESSION["user"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $iduser;
            header("refresh:1.5;url=../index.php");
        }elseif($row["dtEmailBestaetigt"] == 0){
            echo "Bitte Bestätigen Sie Ihren Account!";
            header("refresh:2;url=../index.php?page=#login");
        }
        else{
            array_push($errors, "Wrong username/password combination");
        }
        mysqli_close($mysqli);
    }
    if (count($errors) > 0):
        ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php header("refresh:2;url=../index.php?page=#login");endif ?>
    <?php
}
?>