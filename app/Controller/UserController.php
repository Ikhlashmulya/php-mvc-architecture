<?php

namespace Ikhlashmulya\Phpweb\Controller;

use Ikhlashmulya\Phpweb\Model\User;

class UserController extends Controller
{
    private User $userModel;

    function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        $model = [
            'title' => 'login'
        ];
        $this->view('partial/header', $model);
        $this->view('login', $model);
        $this->view('partial/footer');
    }

    public function register()
    {
        $model = [
            'title' => 'register'
        ];
        $this->view('partial/header', $model);
        $this->view('register', $model);
        $this->view('partial/footer');
    }

    public function doRegister()
    {
        $username = $this->formValue('username');
        $password = $this->formValue('password');
        $confirmPassword = $this->formValue('confirm-password');

        if ($password !== $confirmPassword) {
            $this->setSession('error', 'password not match');
            $this->redirect('/register');
            return;
        }

        if (strlen($password) < 8) {
            $this->setSession('error', 'password must be more than 8 character');
            $this->redirect('/register');
            return;
        }

        $this->userModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        $this->redirect('/login');
    }

    public function doLogin()
    {
        $username = $this->formValue('username');
        $password = $this->formValue('password');

        $user = $this->userModel->findByUsername($username);
        if (!$user) {
            $this->setSession('error', 'username does not exist');
            $this->redirect('/login');
            return;
        }

        if (!password_verify($password, $user->password)) {
            $this->setSession('error', 'password is wrong');
            $this->redirect('/login');
            return;
        }

        $this->setSession('user', $user);
        $this->redirect('/');
    }

    public function doLogout() {
        $this->unsetSession('user');
        $this->redirect('/');
    }
}
