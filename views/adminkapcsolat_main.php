<?php





?>

<div class="data">
    <div class="data-container">
        <h1>Kapcsolat</h1>
        
        <!-- Üzenetek megjelenítése -->
        <?php $messages = $viewData['messages'] ?>
        <?php if (count($messages) > 0): ?>
            <?php foreach ($messages as $message): ?>
                <div class="message">
                    <p id="name"><strong><?php echo htmlspecialchars($message['Email']) . ' ( ' . htmlspecialchars($message['Telefonszam'] . ' ) '); ?></strong></p>
                    <?php
                    // Az Ido mező átkonvertálása olvashatóbb formátumra
                    $datetime = new DateTime($message['Ido']);
                    $formattedDate = $datetime->format('Y.m.d H:i'); // Formátum módosítása
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

        <!-- Üzenet beküldő form -->
        
    </div>
</div>
