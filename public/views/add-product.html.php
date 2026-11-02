<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main>
        <h1>Add product</h1>

        <form action="/pantry/add" method="post" enctype="multipart/form-data">
            <p>
                <label for="name">Product name</label><br>
                <input type="text" id="name" name="name" required>
            </p>
            <p>
                <label for="expiration">Expiration date</label><br>
                <input type="date" id="expiration" name="expiration" required>
            </p>
            <p>
                <label for="category">Category</label><br>
                <select id="category" name="category">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <fieldset>
                <legend>Storage location</legend>
                <?php foreach ($locations as $i => $location): ?>
                    <label>
                        <input type="radio" name="location" value="<?= htmlspecialchars($location) ?>" <?= $i === 0 ? 'checked' : '' ?>>
                        <?= htmlspecialchars($location) ?>
                    </label>
                <?php endforeach; ?>
            </fieldset>
            <p>
                <label for="quantity">Quantity</label><br>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </p>
            <p>
                <label for="photo">Photo</label><br>
                <input type="file" id="photo" name="photo" accept="image/*">
            </p>
            <button type="submit">Save product</button>
            <a href="/pantry">Cancel</a>
        </form>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>
