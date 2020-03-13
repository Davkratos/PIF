<article id="login">
    <form id="form-login" method="post" action="./pages/login.php">
        <h2 class="major">Login</h2>
        <div class="fields">
            <div class="field half">
                <label for="email">Email</label>
                <input required type="text" name="email" id="email_login"/>
            </div>
            <div class="field half">
                <label for="passwort_login">Passwort</label>
                <input required minlength="6" maxlength="18" type="password" name="passwort" class="passw"
                       id="passwort_login"/>
                <span toggle=".passw" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
        </div>
        <ul class="actions">
            <li><input type="submit" value="Login" name="login" class="primary"/></li>
        </ul>
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/powerinthefield/" target="_blank"
                   class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        </ul>
    </form>
    <div class="message_box" style="margin:10px 0px;">
        <!-- LOADING SCREEN -->
        <div id="loader"></div>
    </div>
</article>