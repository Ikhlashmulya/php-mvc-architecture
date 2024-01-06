<?php

namespace Ikhlashmulya\Phpweb\Controller;

use Ikhlashmulya\Phpweb\Application\Response;

class UserController
{
    public function show($id)
    {
        Response::view('user', [
            'title' => 'home',
            'id' => $id
        ]);
    }
}
