<?php

namespace Ikhlashmulya\Phpweb\Config;

trait Response
{
    public function view(string $view, $model = [])
    {
        require_once(__DIR__ . '/../View/' . $view . '.php');
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
    }

    public function json(array $data)
    {
        // TODO : implements method
    }
}
