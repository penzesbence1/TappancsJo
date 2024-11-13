<div class="data">
    <div class="login-container">
        <h2>Regisztráció</h2>
        <form method="POST" action="<?= SITE_ROOT ?>registerkuldes">
            <input type="text" name="lastname" placeholder="Vezetéknév" required>
            <input type="text" name="firstname" placeholder="Keresztnév" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="phone" placeholder="Telefonszám (nem kötelező)">
            <input type="text" name="username" placeholder="Felhasználónév" required>
            <input type="password" name="password" placeholder="Jelszó" required>
            <input type="submit" class="gomb" value="Regisztrálok">

            <?php if (!empty($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
        </form>
        <div class="register">
            <p>Már van fiókod?</p>
            <a href="login">Bejelentkezés</a>
        </div>
    </div>
</div>
