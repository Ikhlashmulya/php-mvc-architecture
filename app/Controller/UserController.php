<?php

namespace Ikhlashmulya\Phpweb\Controller;

class UserController extends Controller
{
    public function show($id)
    {
        $this->view('user', [
            'title' => 'home',
            'id' => $id
        ]);
    }

    public function store()
    {
        $name = $this->formValue('name');
        echo ('Hello ' . $name);
    }
}
