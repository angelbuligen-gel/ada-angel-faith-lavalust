<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: LoginController
 * 
 * Automatically generated via CLI.
 */
class LoginController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        return $this->call->view('ProductViews/login');
    }

    public function authenticate()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'asd' && $password === '123') {

            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;

            header("Location: /products");
            exit();
          
        }

        $_SESSION['error'] = "Invalid username or password.";
        header("Location: /login");
        exit();
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit();
    }
}