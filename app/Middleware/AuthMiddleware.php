<?php

namespace Ikhlashmulya\Phpweb\Middleware;

use Ikhlashmulya\Phpweb\Config\Request;
use Ikhlashmulya\Phpweb\Config\Response;

class AuthMiddleware implements Middleware
{
    use Request, Response;

    public function handle()
    {
        $user = $this->hasSession('user');
        if (!$user) {
            $this->redirect('/login');
        }
    }
}
