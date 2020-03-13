<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>PIF 2019/2020</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="./pages/jquery.js"></script>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
</head>
<style>

    #loader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.75) url(./images/loading2.gif) no-repeat center center;
        z-index: 10000;
    }

    /* Full-width input fields */
    input[type=text], input[type=password], input[type=email] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        color: black;
    }

    input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
        background-color: #ddd;
        outline: none;
    }

    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

    .sign {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .sign__word {
        font-size: 5.4rem;
        text-align: center;
        color: white;
        -webkit-animation: neon 0.5s ease-in-out infinite alternate;
        animation: neon 0.5s ease-in-out infinite alternate;
    }

    /*-- Animation Keyframes --*/
    @-webkit-keyframes neon {
        from {
            text-shadow: 0 0 6px rgba(204, 204, 0, 0.92), 0 0 30px rgba(204, 204, 0, 0.34), 0 0 12px rgba(204, 204, 0, 0.52), 0 0 21px rgba(204, 204, 0, 0.92), 0 0 34px rgba(204, 204, 0, 0.78), 0 0 54px rgba(204, 204, 0, 0.92);
        }
        to {
            text-shadow: 0 0 6px rgba(204, 204, 0, 0.92), 0 0 30px rgba(204, 204, 0, 0.92), 0 0 12px rgba(204, 204, 0, 0.92), 0 0 22px rgba(204, 204, 0, 0.92), 0 0 38px rgba(204, 204, 0, 0.92), 0 0 60px #1e84f2;
        }
    }

    @keyframes neon {
        from {
            text-shadow: 0 0 6px rgba(204, 204, 0, 0.92), 0 0 30px rgba(204, 204, 0, 0.34), 0 0 12px rgba(204, 204, 0, 0.52), 0 0 21px rgba(204, 204, 0, 0.92), 0 0 34px rgba(204, 204, 0, 0.78), 0 0 54px rgba(204, 204, 0, 0.92);
        }
        to {
            text-shadow: 0 0 6px rgba(204, 204, 0, 0.92), 0 0 30px rgba(204, 204, 0, 0.92), 0 0 12px rgba(204, 204, 0, 0.92), 0 0 22px rgba(204, 204, 0, 0.92), 0 0 38px rgba(204, 204, 0, 0.92), 0 0 60px #1e84f2;
        }
    }


    .popup-overlay {
        /*Hides pop-up when there is no "active" class*/
        visibility: hidden;
        position: absolute;
        background: #ffffff;
        border: 3px solid #666666;
        width: 50%;
        height: 50%;
        left: 25%;
    }

    .popup-overlay.active {
        /*displays pop-up when "active" class is present*/
        visibility: visible;
        text-align: center;
    }

    .popup-content {
        /*Hides pop-up content when there is no "active" class */
        visibility: hidden;
    }

    .popup-content.active {
        /*Shows pop-up content when "active" class is present */
        visibility: visible;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
        opacity: 1;
    }

</style>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="logo">
            <span class="icon fa-lightbulb"></span>
        </div>
        <div class="content">
            <div class="inner">
                <?php

                if (isset($_SESSION["username"])) {

                    echo "<h1>Welcome " . $_SESSION['username'] . "</h1>";
                    echo "<div class='sign'>";
                    echo "<span class='sign__word'>Power In The Field</span></br>";
                    echo "</div>";

                } else {

                    ?>
                    <div class="sign">
                        <span class="sign__word">Power In The Field</span><br>
                    </div>
                    <?php

                }

                ?>
                <p>Viele Flughäfen und Bahnhöfe im Ausland bieten für ihre
                    Besucher öffentliche Ladestationen an,<br/>
                    an denen Mobiltelefone oder Tablets aufgeladen werden können.</p>
                <p class="underlined underlined--thin">Power In The Field (PITF) ist eine Startup Firma die das Laden
                    von Geräten über USB auch jetzt in
                    Luxemburg ermöglicht.</p>
            </div>
        </div>

        <nav>
            <ul>
                <?php

                if (isset($_SESSION["username"])) {
                    ?>
                    <li><a href="?page=#pitf">PITF</a></li>
                    <li><a href="?page=#contact">Contact</a></li>
                    <li><a href="?page=#profile">Profile</a></li>
                    <li><a href="?page=#stations">Stationen</a></li>
                    <li><a href="?page=#logout">Logout</a></li>
                    <?php
                } else {

                    ?>
                    <li><a href="?page=#pitf">PITF</a></li>
                    <li><a href="?page=#contact">Contact</a></li>
                    <li><a href="?page=#stations">Stationen</a></li>
                    <li><a href="?page=#register">Register</a></li>
                    <li><a href="?page=#login">Login</a></li>
                    <?php

                }

                ?>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <div id="main">

        <?php

        if (!isset($_SESSION["username"])) {

            //Intro

            include_once("./pages/pitfArticle.php");

            //Contact

            include_once("./pages/contactArticle.php");

            //Stations

            include_once("./pages/stationsArticle.php");

            //Station_1

            include_once("./pages/station_1.php");

            //Register

            include_once("./pages/registerArticle.php");

            //Login

            include_once("./pages/loginArticle.php");
        }

        if (isset($_SESSION["username"])) {

            //Intro

            include_once("./pages/pitfArticle.php");

            //Contact

            include_once("./pages/contactArticle.php");

            //Stations

            include_once("./pages/stationsArticle.php");

            //Station_1

            include_once("./pages/station_1.php");

            //Logout

            include_once("./pages/logoutArticle.php");


            $benutzername = $_SESSION["username"];

            include_once("./pages/sqlConnect.inc.php");
            $query = "SELECT * FROM tblbenutzer WHERE dtBenutzername = '$benutzername' OR dtEmail = '$benutzername'";
            $results = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_array($results);

            $profileEmail = $row[5];
            $profileImage = $row[4];
            $profileUsername = $row[3];
            $profilebalance = $row[8];

            //Profile

            include_once("./pages/profileArticle.php");
        }
        ?>

    </div>

    <!-- Footer -->
    <footer id="footer">
        <p class="copyright">&copy; David Cattani.</p>
    </footer>

</div>

<!-- BG -->
<div id="bg"></div>

<!-- Scripts -->
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/browser.min.js"></script>
<script src="./assets/js/breakpoints.min.js"></script>
<script src="./assets/js/util.js"></script>
<script src="./assets/js/main.js"></script>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="./pages/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function () {
        /*$('#form-login').submit(function (e) {

            alert("SUBMITTED");

            e.preventDefault();

            var email = $('#email_login').val();
            var password = $('#passwort_login').val();

            var datastring = 'mail=' + email + '&pw=' + password;

            alert(email);
            alert(password);
            alert(datastring);

            $.ajax({
                type: 'POST',
                url: './pages/login.php',
                data: datastring,
                beforeSend: function () {
                    // Show image container
                    $('#loader').css("display", "inline-block");
                },
                success: function () {
                    location.href = "http://localhost/PIF/index.php";
                },
                complete: function () {
                    // Hide image container
                    $('#loader').attr("display", "none");
                }
            });
        });*/
        $('#logout').submit(function (e) {

            e.preventDefault();

            var logout = $('#logout_button').val();

            $.ajax({
                type: 'post',
                url: './pages/logout.php',
                data: logout,
                beforeSend: function () {
                    // Show image container
                    $('#loader').css("display", "inline-block");
                },
                success: function () {
                    location.href = "http://localhost/PIF/index.php";
                },
                complete: function () {
                    // Hide image container
                    $('#loader').attr("display", "none");
                }
            });
        });
        //appends an "active" class to .popup and .popup-content when the "Open" button is clicked
        $(".open").on("click", function() {
            $(".popup-overlay, .popup-content").addClass("active");
        });

//removes the "active" class to .popup and .popup-content when the "Close" button is clicked
        $(".open, .popup-overlay").on("click", function() {
            $(".popup-overlay, .popup-content").removeClass("active");
        });

    });
</script>

<script type="text/javascript">

    var button = "<button id='location'>Activate</button>";

    $(".qqvbed-p83tee-lTBxed").append(button);

    $('.toggle-password').click(function () {

        $(this).toggleClass('fa-eye fa-eye-slash');
        var input = $($(this).attr("toggle"));
        if (input.attr('type') == 'password') {
            input.attr('type', 'text');
        } else {
            input.attr('type', 'password');
        }
    });

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

</script>

</body>
</html>
