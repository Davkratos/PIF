<?php
session_start();

$benutzername = $_SESSION["username"];

?>

    <script type="text/javascript">

        setInterval(function () {
            $("#checkTime").load('./pages/checkTime.php');
        }, 1000);

    </script>

<?php

if (isset($_SESSION["username"])) {
    ?>
    <article id="station_1">
        <h2 class="major">Auchan Kirchberg</h2>
        <span class="image main"><img src="./images/Locations/Auchan.png" alt=""/></span>
        <div>

            <h2>Current Used Ports</h2>
            <div id="current_used_ports">
                <script type="text/javascript">

                    setInterval(function () {
                        $("#current_used_ports").load('./pages/getUsedPorts.php');
                    }, 1000);

                </script>

            </div>

            <h2>Current Free Ports</h2>
            <form method="post" action="./pages/activate.php">
                <div id="current_free_ports">
                    <script type="text/javascript">

                        $("#current_free_ports").load('./pages/getFreePorts.php');

                    </script>

                </div>

                <div id="choose_time">

                    <h2>Choose Time to load Phone (In Hours)</h2>
                    <select name="time" required>

                        <?php

                        for ($i = 1; $i <= 3; $i++) {

                            echo "<option value='" . $i . "'>" . $i . "</option>";

                        }

                        ?>

                    </select>

                </div>

            </form>
            <div id="checkTime"></div>

        </div>
    </article>
    <?php
} else {
    ?>
    <article id="station_1">
        <h2 class="major">Please Login to see content</h2>
    </article>
    <?php
}
?>