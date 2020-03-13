<?php

include_once("./sqlConnect.inc.php");

$query = "SELECT dtOrt, dtGebäude, tblPort.dtName, dtEndzeit
FROM `tblstation`, `tblstandort`, `tblport`, `tblaktivieren`, tblbenutzer
WHERE tblport.idPort = tblstation.fiPort AND tblstation.fiStandortcode = tblstandort.idStandortcode 
AND tblbenutzer.idBenutzercode = tblaktivieren.fiBenutzercode AND tblport.idPort = tblaktivieren.fiPort 
AND fiStandortcode = 2 AND tblport.dtPortstatus = 1";

$results = mysqli_query($mysqli, $query);

$num = mysqli_num_rows($results);

echo "<table border='0' style='text-align: center'>";
echo "<tr>";
echo "<th style='text-align: center'>Ort</th>";
echo "<th style='text-align: center'>Gebäude</th>";
echo "<th style='text-align: center'>Besetzter Port</th>";
echo "<th style='text-align: center'>Besetzt Bis</th>";
echo "</tr>";

for ($i = 0; $i < $num; $i++) {

    $row = mysqli_fetch_array($results);

    $location = $row['dtOrt'];
    $portname = $row['dtName'];
    $building = $row['dtGebäude'];
    $ending = $row['dtEndzeit'];

    echo "<tr>";
    echo "<td>" . $location . "</td>";
    echo "<td>" . $building . "</td>";
    echo "<td>" . $portname . "</td>";
    echo "<td>" . $ending . "</td>";
    echo "</tr>";

}

echo "</table>";