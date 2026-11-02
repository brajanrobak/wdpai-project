<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main class="container page-content">
        <div class="page-header">
            <div>
                <h1>My pantry</h1>
                <p class="text-muted"><?= (int) $expiringSoon ?> items expiring soon, <?= count($products) ?> items in total.</p>
            </div>
            <a href="/pantry/add" class="btn-primary">+ Add product</a>
        </div>

        <section aria-labelledby="products-heading">
            <h2 id="products-heading">Products (most urgent first)</h2>
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <?php
                        $badgeClass = 'badge-ok';
                        if ($product['daysLeft'] <= 1) {
                            $badgeClass = 'badge-danger';
                        } elseif ($product['daysLeft'] <= 4) {
                            $badgeClass = 'badge-warning';
                        }
                    ?>
                    <article class="product-card">
                        <div class="product-card-header">
                            <h3>
                                <a href="/pantry/<?= (int) $product['id'] ?>">
                                    <?= htmlspecialchars($product['name']) ?>
                                </a>
                            </h3>
                            <span class="badge <?= $badgeClass ?>">
                                <?= (int) $product['daysLeft'] ?> <?= $product['daysLeft'] === 1 ? 'day' : 'days' ?> left
                            </span>
                        </div>
                        <p class="text-muted">
                            <?= htmlspecialchars($product['category']) ?> &bull;
                            <?= htmlspecialchars($product['location']) ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>