<?php

session_start();

if($_SESSION["verify"] == "verify"){

    echo "Hello " . $_SESSION["verifyUser"] . ", Bitte bestätigen Sie Ihren Account. Schauen Sie Ihre Emails nach, auch den Junk." . "<br>" .
        "Mit Freundlichen Grüssen, Power In The Field Team";
    ?>

    <form method="post">

        <button type="submit" name="DATA_Logout" class="button button-block">Log Out</button>

    </form>

    <?php

}else{
    echo "Unauthorized ACCESS!";
    http_response_code(401);
}

if(isset($_POST["DATA_Logout"])){

    session_unset();

    session_destroy();

    header("refresh:0.5;url=localhost/PIF/index.php?page=#login");

}

?>