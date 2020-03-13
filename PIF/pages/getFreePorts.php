<?php

include_once("./sqlConnect.inc.php");

$query = "SELECT DISTINCT dtOrt, tblport.dtName, dtGebäude 
FROM tblport, tblstation, tblstandort WHERE dtPortstatus = 0";

$results = mysqli_query($mysqli, $query);

$num = mysqli_num_rows($results);

echo "<table border='0' style='text-align: center'>";
echo "<tr>";
echo "<th style='text-align: center'>Ort</th>";
echo "<th style='text-align: center'>Port</th>";
echo "<th style='text-align: center'>Gebäude</th>";
echo "<th style='text-align: center'>Reservieren</th>";
echo "</tr>";

for ($i = 1; $i <= $num; $i++) {

    $row = mysqli_fetch_array($results);

    $location = $row['dtOrt'];
    $portname = $row['dtName'];
    $building = $row['dtGebäude'];

    echo "<tr>";
    echo "<td>" . $location . "</td>";
    echo "<td>" . $portname . "</td>";
    echo "<td>" . $building . "</td>";
    echo "<td><button type='submit' name='activate' value='" . $i . "'>Activate</button>";
    echo "</tr>";

}

echo "</table>";