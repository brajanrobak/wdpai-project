<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <script>
        (function () {
            const storageKey = 'theme';
            let savedTheme = null;

            try {
                savedTheme = localStorage.getItem(storageKey);
            } catch (error) {
                savedTheme = null;
            }

            const hasSavedTheme = savedTheme === 'light' || savedTheme === 'dark';
            const systemPrefersDark = window.matchMedia(
                '(prefers-color-scheme: dark)'
            ).matches;

            document.documentElement.dataset.theme = hasSavedTheme
                ? savedTheme
                : (systemPrefersDark ? 'dark' : 'light');
        })();
    </script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/theme.js" defer></script>
</head>
<body>
    <?php require __DIR__ . '/nav.html.php'; ?>