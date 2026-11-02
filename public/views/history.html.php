<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main>
        <h1>History</h1>

        <section aria-labelledby="log-heading">
            <h2 id="log-heading">Consumed and discarded products</h2>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $entry): ?>
                        <tr>
                            <td><?= htmlspecialchars($entry['name']) ?></td>
                            <td><time datetime="<?= htmlspecialchars($entry['date']) ?>"><?= htmlspecialchars($entry['date']) ?></time></td>
                            <td><?= htmlspecialchars($entry['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>
