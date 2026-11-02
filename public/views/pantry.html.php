<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main>
        <h1>My pantry</h1>
        <p><?= (int) $expiringSoon ?> items expiring soon, <?= count($products) ?> items in total.</p>

        <section aria-labelledby="products-heading">
            <h2 id="products-heading">Products (most urgent first)</h2>
            <?php foreach ($products as $product): ?>
                <article>
                    <h3>
                        <a href="/pantry/<?= (int) $product['id'] ?>">
                            <?= htmlspecialchars($product['name']) ?>
                        </a>
                    </h3>
                    <p>
                        <?= htmlspecialchars($product['category']) ?>,
                        <?= htmlspecialchars($product['location']) ?>
                    </p>
                    <p><strong><?= (int) $product['daysLeft'] ?> days left</strong></p>
                </article>
            <?php endforeach; ?>
        </section>

        <p><a href="/pantry/add">Add a new product</a></p>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>
