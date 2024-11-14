<div class="data">
    <div class="login-container">
        <h1>Kapcsolat</h1>
        <form method="POST" action="<?= SITE_ROOT ?>kapcsolatkuldes"> <!-- Az action itt a megfelelő PHP fájlra mutasson -->
            <label for="email">E-mail cím (kötelező)</label>
            <input type="email" name="email" id="email" required placeholder="E-mail címed">

            <label for="phone">Telefonszám (nem kötelező)</label>
            <input type="text" name="phone" id="phone" placeholder="Telefonszámod (opcionális)">

            <label for="message">Üzenet (kötelező)</label>
            <textarea name="message" id="message" required placeholder="Az üzeneted..." rows="5"></textarea>

            <input type="submit" value="Küldés">
        </form>
    </div>
</div>
