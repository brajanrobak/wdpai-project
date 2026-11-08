<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main class="container page-content">
        <section class="product-card" aria-labelledby="add-product-heading">
            <h1 id="add-product-heading">Add product</h1>

            <?php if (($errors ?? []) !== []): ?>
                <div class="form-errors" role="alert">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars((string) $error, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/pantry/add" method="post" enctype="multipart/form-data" novalidate>
                <p>
                    <label for="name">Product name</label><br>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="<?= htmlspecialchars((string) ($form['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                        required
                    >
                </p>
                <p>
                    <label for="expiration">Expiration date</label><br>
                    <input
                        type="date"
                        id="expiration"
                        name="expiration"
                        value="<?= htmlspecialchars((string) ($form['expiration'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                        required
                    >
                </p>
                <p>
                    <label for="category">Category</label><br>
                    <select id="category" name="category">
                        <?php foreach ($categories as $category): ?>
                            <option
                                value="<?= htmlspecialchars($category) ?>"
                                <?= (($form['category'] ?? '') === $category) ? 'selected' : '' ?>
                            >
                                <?= htmlspecialchars($category) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <fieldset>
                    <legend>Storage location</legend>
                    <?php
                    $selectedLocation = $form['location'] ?? ($locations[0] ?? '');
                    foreach ($locations as $location):
                    ?>
                        <label>
                            <input
                                type="radio"
                                name="location"
                                value="<?= htmlspecialchars($location) ?>"
                                <?= $selectedLocation === $location ? 'checked' : '' ?>
                            >
                            <?= htmlspecialchars($location) ?>
                        </label>
                    <?php endforeach; ?>
                </fieldset>
                <p>
                    <label for="quantity">Quantity</label><br>
                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        min="1"
                        value="<?= htmlspecialchars((string) ($form['quantity'] ?? '1'), ENT_QUOTES, 'UTF-8') ?>"
                    >
                </p>
                <p>
                    <label for="photo">Photo</label><br>
                    <input type="file" id="photo" name="photo" accept="image/*">
                </p>
                <p>
                    <button type="submit">Save product</button>
                    <a href="/pantry">Cancel</a>
                </p>
            </form>
        </section>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>