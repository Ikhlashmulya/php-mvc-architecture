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

    protected function getSession(string $key): mixed
    {
        return $_SESSION[$key];
    }

    protected function hasSession(string $key): bool
    {
        if (isset($_SESSION[$key])) return true;

        return false;
    }

    protected function setSession(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    protected function unsetSession(string $key): void
    {
        unset($_SESSION[$key]);
    }
}
