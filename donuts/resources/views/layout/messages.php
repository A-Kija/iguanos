<div class="messages --msgs">
    <?php foreach ($messages as $message) : ?>
        <div class="alert alert-<?= $message['type'] ?>" role="alert">
            <?= $message['text'] ?>
            <button type="button" class="btn-close"></button>
        </div>
    <?php endforeach; ?>
</div>