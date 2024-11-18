<div class="data">
    <div class="data-container">
        <h1>Üzenőfal</h1>
        <form method="POST" action="<?= SITE_ROOT ?>uzenofalkuldes">
            <input type="text" name="message" placeholder="Írd ide az üzeneted..." required>
            <input type="submit" value="Küldés">
        </form>

        <!-- Display Messages -->
            <?php $messages = $viewData['messages'] ?>

            <?php foreach ($messages as $message): ?>
                <div class="message">
                    <p id="name"><strong><?php echo htmlspecialchars($message['Vezeteknev']) . ' ' . htmlspecialchars($message['Keresztnev']); ?></strong></p>
                    <?php
                    $datetime = new DateTime($message['Ido']);
                    $formattedDate = $datetime->format('Y.m.d H:i');
                    ?>
                    <p id="datum"><?php echo htmlspecialchars($formattedDate); ?></p>
                    <div class="uzenet">
                        <p><?php echo nl2br(htmlspecialchars($message['Uzenet'])); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
       
    </div>
</div>
