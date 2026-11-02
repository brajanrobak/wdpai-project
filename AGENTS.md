# AGENTS.md

## Cel projektu
**FoodSaver** — aplikacja webowa w PHP 8.3 (uruchamiana w Docker Compose) wspomagająca zarządzanie domową spiżarnią, śledzenie terminów ważności produktów spożywczych oraz ograniczanie marnowania żywności.

## Struktura projektu
- `public/index.php` — punkt wejścia aplikacji oraz definicje tras HTTP.
- `public/css/style.css` — główny arkusz stylów CSS (zmienne `:root`, układ Flexbox/Grid, RWD).
- `public/views/` — widoki HTML z fragmentami PHP (`pantry.html.php`, `product.html.php`, `add-product.html.php`, `history.html.php`, `login.html.php`, `home.html.php`, `not-found.html.php`).
- `public/views/partials/` — współdzielone komponenty widoków (`header.html.php`, `nav.html.php`, `footer.html.php`).
- `src/Routing.php` — dopasowanie tras statycznych i dynamicznych (np. `/pantry/{id}`) oraz uruchamianie kontrolerów w namespace `App`.
- `src/controllers/` — kontrolery (`DefaultController`, `PantryController`, `SecurityController`) w namespace `App\Controller`.

## Zasady pracy
- Zachowuj `declare(strict_types=1);` na początku każdego pliku klasy PHP.
- Stosuj autoloading zgodny z PSR-4 (`App\` -> `src/`, `App\Controller\` -> `src/controllers/`).
- Nie dodawaj zewnętrznych frameworków ani bibliotek bez wyraźnej zgody.
- Kontroler przygotowuje dane, a widok odpowiada wyłącznie za ich prezentację.
- Wszystkie dane dynamiczne wyświetlane w HTML zabezpieczaj przez `htmlspecialchars()`.
- Wprowadzaj małe, kontrolowane zmiany i nie modyfikuj plików niezwiązanych z zadaniem.

## Uruchamianie i weryfikacja
- Start środowiska: `docker compose up --build -d`
- Sprawdzenie składni PHP: `docker compose exec -T php php -l ścieżka/do/pliku.php`
- Po zmianie trasy lub widoku zweryfikuj poprawny adres URL w przeglądarce (`http://localhost:8080`) oraz obsługę błędu 404.
- Przed zakończeniem zadania sprawdź `git status` oraz `git diff`.

## Bezpieczeństwo
- Nie odczytuj ani nie commituj sekretów z plików `.env`.
- Nie wykonuj destrukcyjnych poleceń (np. usuwania wolumenów bazy danych lub `git reset --hard`) bez potwierdzenia.
- Nie edytuj ręcznie plików wygenerowanych w katalogu `vendor/`.