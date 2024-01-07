<?php

namespace Ikhlashmulya\Phpweb\Config;

trait Request
{
    protected function formValue(string $name)
    {
        return $_POST[$name];
    }

    protected function query(string $name)
    {
        return $_GET[$name];
    }
}
