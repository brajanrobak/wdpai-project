<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main class="container page-content">
        <section class="product-card" aria-labelledby="login-heading">
            <h1 id="login-heading">Welcome back</h1>
            <p class="text-muted">Manage your pantry, reduce waste.</p>

            <?php if (($errors ?? []) !== []): ?>
                <div class="form-errors" role="alert">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars((string) $error, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/login" method="post" novalidate>
                <p>
                    <label for="email">Email address</label><br>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars((string) ($email ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                        required
                        autocomplete="email"
                    >
                </p>
                <p>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                </p>
                <button type="submit">Log in</button>
            </form>
        </section>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>
