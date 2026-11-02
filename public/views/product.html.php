<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main>
        <p><a href="/pantry">&larr; Back to pantry</a></p>

        <article>
            <h1><?= htmlspecialchars($product['name']) ?></h1>
            <p><strong>Expires in <?= (int) $product['daysLeft'] ?> days</strong></p>

            <dl>
                <dt>Category</dt>
                <dd><?= htmlspecialchars($product['category']) ?></dd>
                <dt>Storage location</dt>
                <dd><?= htmlspecialchars($product['location']) ?></dd>
                <dt>Quantity</dt>
                <dd><?= (int) $product['quantity'] ?></dd>
                <dt>Date added</dt>
                <dd><time datetime="<?= htmlspecialchars($product['added']) ?>"><?= htmlspecialchars($product['added']) ?></time></dd>
            </dl>

            <button type="button">Mark as consumed</button>
            <button type="button">Remove item</button>
        </article>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>
