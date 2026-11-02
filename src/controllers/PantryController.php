<?php

declare(strict_types=1);

namespace App\Controller;

final class PantryController extends AppController
{
    public function index(): void
    {
        $products = $this->products();
        usort(
            $products,
            static fn (array $a, array $b): int => $a['daysLeft'] <=> $b['daysLeft'],
        );

        $this->render('pantry', [
            'pageTitle' => 'FoodSaver - Pantry',
            'products' => $products,
            'expiringSoon' => count(array_filter(
                $products,
                static fn (array $p): bool => $p['daysLeft'] <= 2,
            )),
        ]);
    }

    public function show(int $id): void
    {
        $product = $this->products()[$id] ?? null;

        if ($product === null) {
            http_response_code(404);
            (new DefaultController())->notFound();
            return;
        }

        $this->render('product', [
            'pageTitle' => 'FoodSaver - ' . $product['name'],
            'product' => $product,
        ]);
    }

    public function create(): void
    {
        $this->render('add-product', [
            'pageTitle' => 'FoodSaver - Add product',
            'categories' => ['Dairy', 'Vegetables', 'Meat', 'Bakery', 'Other'],
            'locations' => ['Fridge', 'Freezer', 'Pantry'],
        ]);
    }

    public function history(): void
    {
        $this->render('history', [
            'pageTitle' => 'FoodSaver - History',
            'history' => [
                ['name' => 'Avocados', 'date' => '2026-10-29', 'status' => 'Consumed'],
                ['name' => 'Almond milk', 'date' => '2026-10-27', 'status' => 'Consumed'],
                ['name' => 'Baby spinach', 'date' => '2026-10-25', 'status' => 'Discarded'],
                ['name' => 'Cheddar cheese', 'date' => '2026-10-21', 'status' => 'Consumed'],
            ],
        ]);
    }

    /**
     * Temporary in-memory data. It will be replaced by the database
     * (repository) in later laboratories.
     */
    private function products(): array
    {
        return [
            1 => ['id' => 1, 'name' => 'Strawberries', 'category' => 'Fruit', 'location' => 'Fridge', 'daysLeft' => 1, 'quantity' => 1, 'added' => '2026-10-28'],
            2 => ['id' => 2, 'name' => 'Fresh milk', 'category' => 'Dairy', 'location' => 'Fridge', 'daysLeft' => 1, 'quantity' => 2, 'added' => '2026-10-27'],
            3 => ['id' => 3, 'name' => 'Greek yogurt', 'category' => 'Dairy', 'location' => 'Fridge', 'daysLeft' => 2, 'quantity' => 1, 'added' => '2026-10-28'],
            4 => ['id' => 4, 'name' => 'Sourdough bread', 'category' => 'Bakery', 'location' => 'Pantry', 'daysLeft' => 4, 'quantity' => 1, 'added' => '2026-10-29'],
            5 => ['id' => 5, 'name' => 'Salmon fillets', 'category' => 'Meat', 'location' => 'Freezer', 'daysLeft' => 20, 'quantity' => 3, 'added' => '2026-10-20'],
        ];
    }
}
