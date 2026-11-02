<?php require __DIR__ . '/partials/header.html.php'; ?>
    <main>
        <h1>Welcome back</h1>
        <p>Manage your pantry, reduce waste.</p>

        <form action="/login" method="post">
            <p>
                <label for="email">Email address</label><br>
                <input type="email" id="email" name="email" required autocomplete="email">
            </p>
            <p>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required autocomplete="current-password">
            </p>
            <button type="submit">Log in</button>
        </form>
    </main>
<?php require __DIR__ . '/partials/footer.html.php'; ?>
