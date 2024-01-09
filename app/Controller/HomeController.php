<?php

namespace Ikhlashmulya\Phpweb\Controller;

use Ikhlashmulya\Phpweb\Model\Todo;

class HomeController extends Controller
{
    private Todo $todoModel;

    function __construct()
    {
        $this->todoModel = new Todo();
    }

    public function index()
    {
        $user = $this->getSession('user');
        $todos = $this->todoModel->findByUserId($user->id);

        $model = [
            'title' => 'home',
            'user' => $user,
            'todos' => $todos
        ];

        $this->view('partial/header', $model);
        $this->view('home', $model);
        $this->view('partial/footer');
    }
}
