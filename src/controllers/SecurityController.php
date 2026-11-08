<?php

declare(strict_types=1);

namespace App\Controller;

final class SecurityController extends AppController
{
    public function login(): void
    {
        if (!$this->isPost()) {
            $this->render('login', [
                'pageTitle' => 'FoodSaver - Log in',
            ]);
            return;
        }

        $email = mb_strtolower(trim((string) ($_POST['email'] ?? '')));
        $password = (string) ($_POST['password'] ?? '');

        $errors = [];

        if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address.';
        }

        if (mb_strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters long.';
        }

        if ($errors !== []) {
            http_response_code(422);
            $this->render('login', [
                'pageTitle' => 'FoodSaver - Log in',
                'errors' => $errors,
                'email' => $email,
            ]);
            return;
        }

        $this->redirect('/pantry');
    }
}