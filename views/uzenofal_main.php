<div class="data">
    <div class="login-container">
        <h1>Üzenőfal</h1>

        <!-- Üzenet küldése -->
        <form method="POST" action="">
            <input type="text" name="message" placeholder="Írd ide az üzeneted..." required>
            <input type="submit" value="Küldés">
        </form>

        <!-- Hibaüzenet megjelenítése -->
        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($errorMessage); ?></p>
        <?php endif; ?>

        <!-- Üzenetek megjelenítése -->
        <?php if (isset($uzenofal) && is_array($uzenofal) && count($uzenofal) > 0): ?>
            <?php foreach ($uzenofal as $message): ?>
                <div class="message">
                    <p id="name"><strong><?php echo htmlspecialchars($message['Vezeteknev']) . ' ' . htmlspecialchars($message['Keresztnev']); ?></strong></p>
                    <?php
                    // Az Ido mező átkonvertálása olvashatóbb formátumra
                    $datetime = new DateTime($message['Ido']);
                    $formattedDate = $datetime->format('Y.m.d H:i');
                    ?>
                    <p id="datum"><?php echo htmlspecialchars($formattedDate); ?></p>
                    <div class="uzenet">
                        <p><?php echo nl2br(htmlspecialchars($message['Uzenet'])); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nincs még üzenet.</p>
        <?php endif; ?>

    </div>
</div>
