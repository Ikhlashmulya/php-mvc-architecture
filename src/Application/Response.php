<?php

namespace Ikhlashmulya\Phpweb\Application;

class Response {
  public static function view(string $view, $model = []) {
    require_once(__DIR__ . '/../View/' . $view . '.php');
  }
  
  public static function json() {
    // TODO : create response json
  }
}