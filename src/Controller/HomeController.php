<?php

namespace Ikhlashmulya\Phpweb\Controller;
use Ikhlashmulya\Phpweb\Application\Response;

class HomeController {
  public function index() {
    $model = [
      'title' => 'home'
    ];
    Response::view('index', $model);
  }
}