<div class="data">
    <div class="login-container">
<h2>Belépés</h2>

<form action="<?= SITE_ROOT ?>beleptet" method="post">
    <label for="login">Felhasználónév:</label><input type="text" name="login" id="login" placeholder="Felhasználónév" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_][\-\.a-zA-Z0-9_]+"><br>
    <label for="password">Jelszó:</label><input type="password" name="password" id="password" placeholder="Jelszó" required pattern="[\-\.a-zA-Z0-9_][\-\.a-zA-Z0-9_]+"><br>
    <input type="submit" value="Küldés">
    <div class="register">
            <p>Még nincs fiókod?</p>
            <a href="register">Regisztrálok</a>
        </div>
</form>
</div>
</div>



<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
