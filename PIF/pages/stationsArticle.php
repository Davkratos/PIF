<?php
include_once("./pages/sqlConnect.inc.php");
?>
<article id="stations" style="width: 100%">
    <h2 class="major">Lade Stationen</h2>
    <div style="display: flex; flex-direction: row" id="stationDiv">
        <div style="width: 50%;">
            <span class="image main" style="filter: brightness(170%);float: left; display: inline">
                <img src="images/loadingPhone.gif" alt="" style="width: 100%;"/>
            </span>
        </div>
        <div style="width: 50%; padding-left: 2.5%">
            <table border="1" style="text-align: center">
                <tr>
                    <td>
                        <div style="width: 100%;">
                            <?php

                            //Query to connect all tables:

                            $query = "SELECT idStandortcode, dtOrt, fiStandortcode, idStationscode, idPort, dtPortstatus, 
                            idAktivierung, fiBenutzercode, idBenutzercode 
                            FROM tblstandort, tblstation, tblport, tblaktivieren, tblbenutzer 
                            WHERE tblbenutzer.idBenutzercode = tblaktivieren.fiBenutzercode AND tblport.idPort = tblaktivieren.fiPort AND 
                            tblport.idPort = tblstation.fiPort AND tblstation.fiStandortcode = tblstandort.idStandortcode";
                            $results = mysqli_query($mysqli, $query);
                            $row = mysqli_fetch_array($results);

                            //Query for Auchan Reservations
                            $query_Auchan = "SELECT dtPortstatus FROM tblport WHERE dtPortstatus = 1";
                            $results_auchan = mysqli_query($mysqli, $query_Auchan);
                            $array_auchan = mysqli_fetch_array($results_auchan);
                            $ports_used_Auchan = mysqli_num_rows($results_auchan);
                            $ports_free_Auchan = 3 - $ports_used_Auchan;

                            //Query for Gare Reservations
                            /*$query_Gare = "SELECT dtVorname, tblStation.dtName, dtOrt, dtGebäude, tblport.dtName FROM
                            `tblstation`, `tblstandort`, `tblport`, `tblbenutzer`, `tblaktivieren` WHERE 
                            tblport.idPort = tblstation.fiPort AND tblstation.fiStandortcode = tblstandort.idStandortcode 
                            AND tblbenutzer.idBenutzercode = tblaktivieren.fiBenutzercode AND tblport.idPort = tblaktivieren.fiPort AND fiStandortcode = 1";
                            $results_gare = mysqli_query($mysqli, $query_Gare);
                            $array_gare = mysqli_fetch_array($results_gare);
                            $ports_used_Gare = mysqli_num_rows($results_gare);
                            $ports_free_Gare = 4 - $ports_used_Gare;*/


                            ?>
                            <img src="./images/Locations/Auchan.png" style="width: 100%;"><br>
                            <span>Available Ports: <?php echo $ports_free_Auchan ?></span><br>
                            <span>Used Ports: <?php echo $ports_used_Auchan ?></span><br>
                            <?php

                            if(isset($_SESSION["username"])){

                                if ($ports_free_Auchan < 1) {
                                    ?>
                                    <button type="button" disabled>No Ports Free</button>
                                    <?php
                                } else {
                                    ?>
                                    <button><a href="?page=#station_1">Activate Port</a></button>
                                    <?php
                                }

                            }else{
                                ?>

                                <button disabled>Please Login</button>
                                <?php
                            }
                            ?>

                        </div>
                    </td>
                    <td>
                        <div style="width: 100%;">
                            <img src="./images/Locations/Gare.png" style="width: 100%;"><br>
                            <span>Available Ports: 0</span><br>
                            <span>Used Ports: 4</span><br>
                            <?php

                            if ($ports_free_Gare < 1) {
                                ?>
                                <button type="button" disabled>No Ports Free</button>
                                <?php
                            } else {
                                ?>
                                <button><a href="?page=#station_2">Activate Port</a></button>
                                <?php
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 100%;">
                            <img src="./images/Locations/Mudam.png" style="width: 100%;"><br>
                            <span>Available Ports: 4</span><br>
                            <span>Used Ports: 0</span><br>
                            <button><a href="?page=#station_3">Activate Port</a></button>
                        </div>
                    </td>
                    <td>
                        <div style="width: 100%;">
                            <img src="./images/Locations/Theatre.png" style="width: 100%;"><br>
                            <span>Available Ports: 4</span><br>
                            <span>Used Ports: 0</span><br>
                            <button><a href="?page=#station_4">Activate Port</a></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <h2 class="major">Orte</h2>
    <span class="image main" style="filter: brightness(150%);">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ri1_j91Yp43ZCewDHfphAACRHRGxIYw2" width="100%"
                height="480"></iframe>
    </span>
</article>