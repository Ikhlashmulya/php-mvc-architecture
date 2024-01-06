<?php

namespace Ikhlashmulya\Phpweb\Application;

class Response {
  public static function view(string $view, $model = []) {
    require_once(__DIR__ . '/../View/' . $view . '.php');
  }
  
  public static function redirect(string $url) {
    // TODO : implements method
  }
  
  public static function json(array $data) {
    // TODO : implements method
  }
}
