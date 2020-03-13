<article id="stations" style="width: 100%">
    <h2 class="major">Lade Stationen</h2>
    <div style="display: flex; flex-direction: row" id="stationDiv">
        <div style="width: 50%;">
            <span class="image main" style="filter: brightness(170%);float: left; display: inline">
                <img src="images/loadingPhone.gif" alt="" style="width: 100%;"/>
            </span>
        </div>
        <div style="width: 25%; padding-left: 2.5%">
            <img src="./images/Locations/Auchan.jpg" style="width: 100%;"><br>
            <span>Available Ports: <?php echo $ports_free ?></span><br>
            <span>Used Ports: <?php echo $ports_used ?></span><br>
            <button>Activate Port</button>
        </div>
        <div style="width: 25%; padding-left: 2.5%;">
            <img src="./images/Locations/Gare.jpg" style="width: 100%;"><br>
            <span>Available Ports: <?php echo $ports_free ?></span><br>
            <span>Used Ports: <?php echo $ports_used ?></span><br>
            <button>Activate Port</button>
        </div>
    </div>

    <h2 class="major">Orte</h2>
    <span class="image main" style="filter: brightness(150%);">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ri1_j91Yp43ZCewDHfphAACRHRGxIYw2" width="100%"
                height="480"></iframe>
    </span>
</article>