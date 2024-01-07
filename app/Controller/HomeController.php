<?php

namespace Ikhlashmulya\Phpweb\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $model = [
            'title' => 'home'
        ];
        $this->view('home', $model);
    }
}
