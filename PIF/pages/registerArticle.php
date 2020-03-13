<article id="register">
    <form id="register" method="post" action="./pages/register.php">
        <h2 class="major">Register</h2>
        <div class="fields">
            <div class="field half">
                <label for="name">Name</label>
                <input required minlength="2" type="text" name="name" id="name_register"/>
            </div>
            <div class="field half">
                <label for="name">Vorname</label>
                <input required minlength="2" type="text" name="vorname" id="vorname_register"/>
            </div>
            <div class="field half">
                <label for="email">Email</label>
                <input required type="email" name="email" id="email_register"/>
            </div>
            <div class="field half">
                <label for="email">Benutzername</label>
                <input required minlength="5" maxlength="12" type="text" name="benutzername"
                       id="benutzername_register"/>
            </div>
            <div class="field half">
                <label for="photo">Profil Foto</label>
                <input minlength="5" type="text" name="foto" id="foto_register"/>
            </div>
            <div class="field half">
                <label for="passwort_register">Passwort</label>
                <input required minlength="6" maxlength="18" type="password" name="passwort" class="passw"
                       id="passwort_register"/>
                <span toggle=".passw" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="field half">
                <label for="email">Passwort Bestätigen</label>
                <input required minlength="6" maxlength="18" type="password" class="passw" name="passwortverif"
                       id="verif_passwort_register"/>
            </div>
        </div>
        <ul class="actions">
            <li><input type="submit" value="Registrieren" name="register" class="primary"/></li>
        </ul>
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/powerinthefield/" target="_blank"
                   class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        </ul>
    </form>
</article>