<?php

namespace Ikhlashmulya\Phpweb\Controller;

use Ikhlashmulya\Phpweb\Model\Todo;

class TodoController extends Controller
{
    private Todo $todoModel;

    function __construct()
    {
        $this->todoModel = new Todo();
    }

    public function store()
    {
        $user = $this->getSession('user');
        $todo = $this->formValue('todo');

        $this->todoModel->insert([
            'todo' => $todo,
            'user_id' => $user->id
        ]);

        $this->redirect('/');
    }

    public function remove($id)
    {
        $todo = $this->todoModel->findById($id);
        if (!$todo) {
            throw new \Exception("todo not found");
        }

        $this->todoModel->delete(["id" => $todo->id]);

        $this->redirect('/');
    }
}
