<article id="profile">
    <!--TODO Add Ph Nr to Profile on Registration and profile page-->
    <!--Creates the popup body-->
    <div class="popup-overlay">
        <!--Creates the popup content-->
        <div class="popup-content">
            <h2>Pop-Up</h2>
            <p> This is an example pop-up that you can make using jQuery.</p>
            <!--popup's close button-->
            <button class="close">Close</button>
        </div>
    </div>
    <h2 class="major">Profil</h2>
    <form id="register" method="post" action="./pages/editProfile.php">
        <div id="profile_edit" style="display: flex; flex-direction: row;">
                    <span class="image main"><img src="<?php echo $profileImage ?>" alt="profileImage"
                                                  style="width: 100%; height: 310px;"></span>
            <div class="fields" style="margin-top: -5%; margin-left: 15%;">
                <div class="field half" style="margin-top: 20%">
                    <label for="email">Email</label>
                    <span><?php echo $profileEmail ?></span>
                </div>
                <br>
                <div class="field half">
                    <label for="username">Benutzername</label>
                    <span><?php echo $profileUsername ?></span>
                </div>
                <br>
                <div class="field half">
                    <label for="photo">Profil Foto</label>
                    <input value="<?php echo $profileImage ?>" minlength="5" type="text" name="foto"
                           id="foto_edit"/>
                </div>
                <br>
                <div class="field half">
                    <label for="balance">Guthaben</label>
                    <span><?php echo $profilebalance . "€" ?></span>
                </div>
            </div>
        </div>
        <ul class="actions" style="margin-top: 5%;">
            <li><input type="submit" value="Speichern" name="save" class="primary"/></li>
        </ul>
    </form>
    <form id="loadbalance" method="post" action="./pages/loadbalance.php">
        <div class="field half">
            <label for="balance_edit">Guthaben Aufladen</label>
            <input type="number" name="balance" id="balance_edit" style="color: black;"/>
        </div>
        <ul class="actions" style="margin-top: 5%;">
            <li>
                <input type="submit" value="Guthaben Aufladen" name="charge" class="primary"/>
            </li>
        </ul>
    </form>

    <div id="current_charging">

        <h2 class='major'>Aktuelle Ladungen</h2>
        <table border='0' id='curr_charging' style='padding: 2%; border: 2px solid red;'>
        </table>
            <script type="text/javascript">

                setInterval(function () {
                    $("#curr_charging").load('./pages/getCurrCharging.php');
                }, 1000);

            </script>

        <h2 class='major'>Letzte Ladungen</h2>
        <table border='0' id='past_charging' style='padding: 2%; border: 2px solid red;'>
        </table>
        <script type="text/javascript">

            setInterval(function () {
                $("#past_charging").load('./pages/getPastCharging.php');
            }, 1000);

        </script>

    </div>

    <ul class="icons">
        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="https://www.facebook.com/powerinthefield/" target="_blank"
               class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
    </ul>
</article>