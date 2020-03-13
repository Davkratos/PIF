<?php

session_start();

include_once("./sqlConnect.inc.php");

$query = "SELECT dtOrt, dtGebäude, tblPort.dtName, dtEndzeit
FROM `tblstation`, `tblstandort`, `tblport`, `tblaktivieren`, tblbenutzer
WHERE tblport.idPort = tblstation.fiPort AND tblstation.fiStandortcode = tblstandort.idStandortcode
AND tblbenutzer.idBenutzercode = tblaktivieren.fiBenutzercode AND tblport.idPort = tblaktivieren.fiPort 
AND fiStandortcode = 2";

$results = mysqli_query($mysqli, $query);

$num = mysqli_num_rows($results);

$now = date('H:i:s', time());

for ($i = 0; $i < $num; $i++) {

    $row = mysqli_fetch_array($results);

    $ending = $row['dtEndzeit'];

    if ($ending < $now) {

        $query = "UPDATE tblport, tblaktivieren
        SET dtPortstatus = 0
        WHERE tblaktivieren.fiPort = tblport.idPort AND CURRENT_TIMESTAMP > tblaktivieren.dtEndzeit";

        mysqli_query($mysqli, $query);

        //header("Refresh:0; url=http://localhost/PIF/?page=#station_1");
        ?>

        <script type="text/javascript">

            $("#current_free_ports").load('./pages/getFreePorts.php');

        </script>
        <?php

    }

}