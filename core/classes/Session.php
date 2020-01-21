<?php


namespace Core;


class Session
{
    private $model;
    private $user;

    public function __construct()
    {
        $this->model = new \App\Users\Model();
        $this->loginFromCookie();
    }

    public function loginFromCookie()
    {
        if ($_SESSION) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }
    }

    public function login($email, $password)
    {
        $users = $this->model->get([
            'email' => $email,
            'password' => $password
        ]);

        if (!empty($users)) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $this->user = $users[0];

            return true;
        }

        return false;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function userLoggedIn()
    {
        if ($this->user) {
            return true;
        }
    }

    public function logout($redirect = false)
    {
        $_SESSION = [];
        session_destroy();
        setcookie(session_name(), null, -1);
        if ($redirect) {
            header("Location: $redirect");
        }
    }
}