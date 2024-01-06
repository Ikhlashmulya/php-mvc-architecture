<?php

namespace Ikhlashmulya\Phpweb\Middleware;

class AuthMiddleware {
  public function __invoke() {
    echo("Before execute handler");
  }
}