<?php


namespace App\Views;


use Core\View;

class Navigation extends \Core\View
{
    public function __construct()
    {
        $this->data = [
            'left' => [
                ['title' => 'Home', 'url' => '/index.php']
            ],
            'right' => [
                'login' => ['title' => 'Login', 'url' => '/login.php'],
                'register' => ['title' => 'Register', 'url' => '/register.php'],
                'logout' => ['title' => 'Logout', 'url' => '/logout.php']
            ],
        ];

        if ($_SESSION['email'] ?? false) {
            unset($this->data['right']['login']);
            unset($this->data['right']['register']);
        } else {
            unset($this->data['right']['logout']);
        }
    }

    public function render($template_path = ROOT . '/app/templates/navigation.tpl.php')
    {
        return parent::render($template_path);
    }
}