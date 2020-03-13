<?php
session_start();
include_once("./sqlConnect.inc.php");

if (isset($_POST['register'])) {
    $errors = array();
    // receive all input values from the form
    $firstname = mysqli_real_escape_string($mysqli, $_POST['vorname']);
    $surname = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $username = mysqli_real_escape_string($mysqli, $_POST['benutzername']);
    $password = mysqli_real_escape_string($mysqli, $_POST['passwort']);
    $passwordverif = mysqli_real_escape_string($mysqli, $_POST['passwortverif']);
    $picture = mysqli_real_escape_string($mysqli, $_POST['foto']);
    $balance = "25,00";
    $passwordhash = md5($password);

    if (empty($firstname)) { array_push($errors, "Firstname is required"); }
    if (empty($surname)) { array_push($errors, "Surname is required"); }
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if ($password != $passwordverif) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM tblbenutzer WHERE dtBenutzername='$username' OR dtEmail='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['dtBenutzername'] === $username){
            array_push($errors, "Username already exists");
        }
        if ($user['dtEmail'] === $email) {
            array_push($errors, "Email existiert bereits");
        }
    }

    if (count($errors) == 0) {
        $insert_query = "INSERT INTO tblbenutzer(dtName, dtVorname, dtBenutzername, dtEmail, dtPassworthash, dtGuthaben) values(?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($insert_query);
        $stmt->bind_param("sssssd", $surname, $firstname, $username, $email, $passwordhash, $balance);
        $stmt->execute();
        $stmt->close();
        echo "Ihr Account wird erstellt, Sie bekommen eine Email zum Bestätigen des Accounts.";
        header("refresh:5;url=http://localhost/PIF/index.php");
        $to = $email;
        $subject = "Power In The Field";
        $txt = "Willkommen " . $firstname . " bei Power In The Field. Bitte verifizieren Sie Ihren Account mit folgendem Link: localhost/PIF/pages/verify.php?email=" . $email . "&hash=" . $passwordhash;
        $headers = "From: powerinthefield@gmail.com";
        mail($to,$subject,$txt,$headers);
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