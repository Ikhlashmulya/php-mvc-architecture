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
        // TODO : implements method
    }

    public function json(array $data)
    {
        // TODO : implements method
    }
}