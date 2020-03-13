<?php

session_start();
include_once("./sqlConnect.inc.php");

$user = $_SESSION["user"];
$usermail = $_SESSION["email"];

$query = "SELECT dtName, dtVorname, dtEmail, dtEndzeit, dtAnfangszeit, dtDatum FROM tblaktivieren, tblbenutzer 
WHERE tblaktivieren.fiBenutzercode = tblbenutzer.idBenutzercode AND 
tblbenutzer.dtBenutzername = '$user' AND tblBenutzer.dtEmail = '$usermail'";

$results = mysqli_query($mysqli, $query);

$num = mysqli_num_rows($results);

for ($i = 0; $i < $num; $i++) {

    $row = mysqli_fetch_array($results);
    $name = $row['dtName'];
    $f_name = $row['dtVorname'];
    $email = $row['dtEmail'];
    $endtime = $row['dtEndzeit'];
    $dtDatum = $row["dtDatum"];

    $class = (($i % 2) == 0) ? "table_odd_row" : "table_even_row";

    $now = new DateTime();
    $now = $now->format('Y-m-d H:i:s');
    $date = new DateTime();
    $date = $date->format('Y-m-d');

    $datetime1 = new DateTime($endtime);//start time
    $datetime2 = new DateTime($now);//end time
    $interval = $datetime1->diff($datetime2);
    $interval = $interval->format('%H h %i m %s s');

    $date1 = new DateTime($dtDatum);//start time
    $date2 = new DateTime($date);//end time
    $interval2 = $date1->diff($date2);
    $interval2 = $interval2->format('%Y Year %m Month %d Day');

    if ($date1 = $date2 && $datetime1 > $datetime2) {

        echo "<tr style='text-align: center;'>";
        echo "<td style='text-align: center;' class=" . $class . ">$name</td>";
        echo "<td style='text-align: center;' class=" . $class . ">$f_name</td>";
        echo "<td style='text-align: center;' class=" . $class . ">$email</td>";
        echo "<td style='text-align: center;' class=" . $class . ">$interval</td>";
        echo "</tr>";

    }

}